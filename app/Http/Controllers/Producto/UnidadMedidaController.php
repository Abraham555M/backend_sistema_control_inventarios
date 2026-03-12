<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Models\Producto;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UnidadMedidaController extends Controller
{
    public function selectUnidadesMedida()
    {
        $unidades_medida = UnidadMedida::select("id_unidad_medida", "nom_unidad_medida")
                        ->where('est_unidad_medida', 1) // Solo activas
                        ->orderBy('nom_unidad_medida', 'asc')
                        ->get();

        if ($unidades_medida->isEmpty()) {
            return ApiResponse::notFound("No se encontraron unidades de medida");
        }

        return ApiResponse::ok($unidades_medida, 'Unidades de medida obtenidas correctamente');
    }

    public function listarUnidadMedida(Request $request){
        $request->validate([
            "estado" => 'nullable|integer|in:0,1',
            "buscar" => 'nullable|max:100'
        ]);

        $totalProductos = Producto::count();

        $query = UnidadMedida::withCount("productos");
        
        if($request->filled("estado")){
            $query->where("est_unidad_medida", $request->estado); 
        }

        if($request->filled("buscar")){
            $query->where("nom_unidad_medida", "like", "%" . $request->buscar . "%");
        }

        $unidades_medida = $query->orderBy('created_at', 'desc')
                                ->get();
        
        if($unidades_medida->isEmpty()){
            return ApiResponse::notFound("No se encontraron Unidades de medida");
        }

        return ApiResponse::ok([
            'total_productos' => $totalProductos,
            'unidades_medida' => $unidades_medida
        ], "Unidades de medida listadas correctamente");    
    }

    public function registrarUnidadMedida(Request $request){   
        $data = $request->validate([
            "nom_unidad_medida" => [
                "required",
                "string",
                "max:100",
                Rule::unique("unidad_medidas", "nom_unidad_medida")
                    ->whereNull("deleted_at")
            ],
            "abr_unidad_medida" => [
                "required",
                "string",
                "max:3",
                Rule::unique("unidad_medidas", "abr_unidad_medida")
                    ->whereNull("deleted_at")
            ]
        ]);

        // Convertir a mayúsculas
        $data["nom_unidad_medida"] = mb_strtoupper($data["nom_unidad_medida"]);
        $data["abr_unidad_medida"] = mb_strtoupper($data["abr_unidad_medida"]);

        $data["est_unidad_medida"] = UnidadMedida::ACTIVO; 
        $unidad_medida = UnidadMedida::create($data);
        
        return ApiResponse::created($unidad_medida, "Unidad medida creada correctamente"); 
    }

    public function eliminarUnidadMedida($id_unidad_medida){
        $unidad_medida = UnidadMedida::find($id_unidad_medida); 

        if(!$unidad_medida){
            return ApiResponse::notFound("Unidad de medida no encontrada"); 
        }

        $unidad_medida->delete(); 
        return ApiResponse::ok($unidad_medida, "Unidad de medida eliminada correctamente"); 
    }

    public function obtenerUnidadMedidaPorId($id_unidad_medida){
        $unidad_medida = UnidadMedida::withTrashed() // Trae tambien unidades de medida eliminados
                        ->find($id_unidad_medida); 

        if(!$unidad_medida){
            return ApiResponse::notFound("No se encontró una unidad de medida para este id: $id_unidad_medida"); 
        }

        return ApiResponse::ok($unidad_medida, "Unidad de medida encontrada"); 
    }

    public function actualizarUnidadMedida(Request $request, $id_unidad_medida){
        $unidad_medida = UnidadMedida::find($id_unidad_medida); 

        if(!$unidad_medida){
            return ApiResponse::notFound("No se encontró una unidad de medida para este id: $unidad_medida");
        }
        $data = $request->validate([
            "nom_unidad_medida" => "required|string|max:100",
            "abr_unidad_medida" => [
                "required",
                "string",
                "max:3",
                Rule::unique("unidad_medidas", "abr_unidad_medida") // El campo debe ser único
                    ->ignore($id_unidad_medida, "id_unidad_medida") // Ignora el registro actual 
                    ->whereNull("deleted_at") // Considera registros no eliminados (exluye los eliminados)
            ],
            "est_unidad_medida" => "required|integer|in:0,1"
        ]);

        // Convertir a mayúsculas
        $data["nom_unidad_medida"] = mb_strtoupper($data["nom_unidad_medida"]);
        $data["abr_unidad_medida"] = mb_strtoupper($data["abr_unidad_medida"]);
        
        $unidad_medida->update($data); 

        return ApiResponse::ok($unidad_medida, "Unidad de medida actualizada correctamente");
    }
}
