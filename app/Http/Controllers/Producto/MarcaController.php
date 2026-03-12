<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MarcaController extends Controller
{
    public function selectMarcas()
    {
        $marcas = Marca::select("id_marca", "nom_marca")
                        ->where('est_marca', 1) // Solo activas
                        ->orderBy('nom_marca', 'asc')
                        ->get();

        if ($marcas->isEmpty()) {
            return ApiResponse::notFound("No se encontraron marcas");
        }

        return ApiResponse::ok($marcas, 'Marcas obtenidas correctamente');
    }

    public function listarMarcas(Request $request){
        $request->validate([
            "estado" => 'nullable|integer|in:0,1',
            "buscar" => 'nullable|max:100'
        ]);

        $totalProductos = Producto::count();

        $query = Marca::select("id_marca", "id_pais", "nom_marca", "est_marca")
                    ->withCount("productos")
                    ->with('pais:id_pais,nom_pais,iso2_pais,iso3_pais');

        if($request->filled('estado')){
            $query->where("est_marca", $request->estado);
        }

        if($request->filled('buscar')){
            $query->where("nom_marca", 'like', '%' . $request->buscar . '%');
        }

        $marcas = $query->orderBy('created_at', 'desc')
                    ->get(); 

        if($marcas->isEmpty()){
            return ApiResponse::notFound("No se encontraron marcas");
        }

        return ApiResponse::ok([
            'total_productos' => $totalProductos,
            'marcas' => $marcas
        ], "Marcas listadas correctamente");     
    }

    public function registrarMarcas(Request $request){
        $data = $request->validate([
            'nom_marca' => [
                'required',
                'string',
                'max:100',
                Rule::unique('marcas', 'nom_marca')->whereNull('deleted_at')
            ],
            'id_pais' => 'required|exists:pais,id_pais'
        ]);

        $data['est_marca'] = Marca::ACTIVO;
        $marca = Marca::create($data);

        return ApiResponse::created($marca, "Marca creada correctamente"); 
    }

    public function eliminarMarca($id_marca){
        $marca = Marca::find($id_marca); 

        if(!$marca){
            return ApiResponse::notFound("No se encontró una marca para este id: $id_marca");
        }

        $marca->delete();
        
        return ApiResponse::ok(null, "Marca eliminada correctamente");
    }

    public function obtenerMarcaPorId($id_marca){
        $marca = Marca::withTrashed() // Trae tambien marcas eliminadas
                        ->select("id_marca", "id_pais", "nom_marca", "est_marca")
                        ->with('pais:id_pais,nom_pais,iso2_pais,iso3_pais')
                        ->find($id_marca); 
        if(!$marca){
            return ApiResponse::notFound("No se encontró una marca para este id: $id_marca"); 
        }

        return ApiResponse::ok($marca, "Marca encontrada"); 
    }

    public function actualizarMarca(Request $request, $id_marca){
        $marca = Marca::find($id_marca); 

        if(!$marca){
            return ApiResponse::notFound("No se encontró una marca para este id: $id_marca");
        }        

        $data = $request->validate([
            'nom_marca' => [
                'required',
                'string',
                'max:100',
                Rule::unique('marcas', 'nom_marca')
                    ->ignore($id_marca, 'id_marca')
                    ->whereNull('deleted_at')
                /**
                 * Mismo nombre que la marca actual
                 * Nombre usado por otra marca activa
                 * Nombre usado por marca eliminada
                 */
            ],
            'id_pais' => 'required|exists:pais,id_pais',
            'est_marca'=> 'required|integer|in:0,1'
        ]);

        $marca->update($data); 

        return ApiResponse::ok($marca, "Marca actualizada correctamente");
    }
}
