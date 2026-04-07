<?php

namespace App\Http\Controllers\Almacenes;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Models\Almacen;
use App\Models\Sucursal;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SucursalController extends Controller
{
    public function listarSucursalYAlmacenes()
    {
        $sucursales = Sucursal::select('id_sucursal', 'nom_sucursal', 'dir_sucursal', 'id_distrito', 'est_sucursal')
            ->with([
                'distrito:id_distrito,nom_distrito',
                // Relación con almacenes (query personalizada)
                'almacenes' => function ($query) {
                    $query->select('id_almacen', 'id_sucursal', 'cod_almacen', 'nom_almacen')
                        //->where('est_almacen', 1)
                        // Conteo total de ubicaciones por almacén
                        ->withCount('ubicaciones as total_ubicaciones')
                        // Conteo de ubicaciones ocupadas (con stock > 0)
                        ->withCount([
                            'ubicaciones as ubicaciones_ocupadas' => function ($query) {
                                $query->whereHas('movimientoDetalles', function ($q) {
                                    $q->where('can_movimiento_detalle', '>', 0);
                                });
                            }
                        ]);
                },
            ])
            ->withCount('almacenes as total_almacenes')
            ->orderBy('created_at', 'desc')
            ->get()
            // Transformación de resultados
            ->map(function ($sucursal) {
                // Calcular porcentaje de ocupación por cada almacén
                $sucursal->almacenes->each(function ($almacen) {
                    $almacen->ocupacion = $almacen->total_ubicaciones > 0
                        ? round(($almacen->ubicaciones_ocupadas / $almacen->total_ubicaciones) * 100, 2)
                        : 0;
                });
                // Sumar todas las ubicaciones de los almacenes de la sucursal
                $sucursal->total_ubicaciones = $sucursal->almacenes
                    ->sum('total_ubicaciones');

                return $sucursal;
            });

        return ApiResponse::ok($sucursales, 'Lista de Sucursales');
    }

    public function registrarSucursal(Request $request){
        $data = $request->validate([
            'nom_sucursal' => [
                'required',
                'string',
                'max:150',
                Rule::unique('sucursales', 'nom_sucursal')->whereNull('deleted_at')
            ],
            'tel_sucursal' => 'string|max:9',
            'dir_sucursal' => 'required|string|max:200',
            'id_distrito' => 'required|exists:distritos,id_distrito'
        ]);

        $data['est_sucursal'] = Sucursal::ACTIVO; 
        $sucursal = Sucursal::create($data);

        return ApiResponse::created($sucursal, 'Sucursal creada correctamente'); 
    }

    public function actualizarSucursal(Request $request, $id_sucursal){
        $sucursal = Sucursal::withTrashed()->find($id_sucursal);

        if (!$sucursal) {
            return ApiResponse::notFound('Sucursal no encontrada');
        }
        
        // Validar si está eliminado
        if ($sucursal->trashed()) {
            return ApiResponse::conflict('No se puede actualizar una sucursal eliminada');
        }

        $data = $request->validate([
            'nom_sucursal' => [
                'required',
                'string',
                'max:150',
                Rule::unique('sucursales', 'nom_sucursal')
                    ->ignore($id_sucursal, 'id_sucursal')
                    ->whereNull('deleted_at')
            ],
            'tel_sucursal' => 'required|string|max:9',
            'dir_sucursal' => 'required|string|max:200',
            'id_distrito' => 'required|exists:distritos,id_distrito',
            'est_sucursal' => 'required|integer|in:0,1'
        ]);

        $sucursal->update($data);

        return ApiResponse::ok($sucursal, "Sucursal actualizada correctamente");
    }

    public function obtenerEstadisticas(){
        $sucursales = Sucursal::where('est_sucursal', 1)->count();
        $almacenes = Almacen::where('est_almacen', 1)->count();
        $ubicaciones = Ubicacion::where('est_ubicacion', 1)->count();

        $ubicaciones_ocupadas = Ubicacion::where('est_ubicacion', 1)
            ->whereHas('movimientoDetalles', function ($q) {
                $q->where('can_movimiento_detalle', '>', 0);
            })
            ->count();

        $ocupacion = $ubicaciones > 0
            ? round(($ubicaciones_ocupadas / $ubicaciones) * 100, 2)
            : 0;

        $estadisticas = [
            'sucursales'  => $sucursales,
            'almacenes'   => $almacenes,
            'ubicaciones' => $ubicaciones,
            'ocupacion'   => $ocupacion,
        ];

        return ApiResponse::ok($estadisticas, "Estadísticas generales");
    }

    public function eliminarSucursal($id_sucursal)
    {
        $sucursal = Sucursal::find($id_sucursal);

        if (!$sucursal) {
            return ApiResponse::notFound("No se encontró una sucursal para este id: $id_sucursal");
        }

        // Verificar si alguna ubicación de la sucursal tiene productos asignados
        $tieneProductos = Ubicacion::whereHas('almacen', function ($q) use ($id_sucursal) {
                $q->where('id_sucursal', $id_sucursal);
            })
            ->whereHas('movimientoDetalles', function ($q) {
                $q->where('can_movimiento_detalle', '>', 0);
            })
            ->exists();

        if ($tieneProductos) {
            return ApiResponse::conflict("No se puede eliminar la sucursal porque tiene productos asignados en sus ubicaciones");
        }

        DB::transaction(function () use ($sucursal) {
            // 1. Eliminar ubicaciones de todos los almacenes de la sucursal
            Ubicacion::whereHas('almacen', function ($q) use ($sucursal) {
                $q->where('id_sucursal', $sucursal->id_sucursal);
            })->delete();

            // 2. Eliminar almacenes de la sucursal
            $sucursal->almacenes()->delete();

            // 3. Eliminar la sucursal
            $sucursal->delete();
        });

        return ApiResponse::ok(null, "Sucursal y sus almacenes y ubicaciones eliminadas correctamente");
    }
}
