<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriaController extends Controller
{
    public function selectCategorias()
    {
        $categorias = Categoria::select("id_categoria", "nom_categoria")
                        ->where('est_categoria', 1) // Solo activas
                        ->orderBy('nom_categoria', 'asc')
                        ->get();

        if ($categorias->isEmpty()) {
            return ApiResponse::notFound("No se encontraron categorias");
        }

        return ApiResponse::ok($categorias, 'Categorias obtenidas correctamente');
    }

    // Metodo para listar y filtrar por estado o búsqueda
    public function listarCategorias(Request $request)
    { 
        // Validación de filtros opcionales 
        $request->validate([
            'estado' => 'nullable|integer|in:0,1',
            'buscar' => 'nullable|max:100'
        ]);

        $query = Categoria::select("id_categoria", "id_icono", "id_color", "nom_categoria", "est_categoria")
                        ->withCount("productos")
                        ->with([
                            "icono:id_icono,nom_icono,cod_icono",
                            "color:id_color,nom_color,hex_color"
                        ]);                                

        // Filtro por estado
        if($request->filled('estado')){
            $query->where('est_categoria', $request->estado);        
        }

        // Filtro por búsqueda
        if($request->filled('buscar')){
            $query->where('nom_categoria', 'like', '%' . $request->buscar . '%');
        }

        $categorias = $query->orderBy('created_at', 'desc')
                        ->get();

        if ($categorias->isEmpty()) {
            return ApiResponse::notFound("No se encontraron categorias");
        }

        return ApiResponse::ok($categorias, 'Categorias listadas correctamente');
    }

    public function registrarCategoria(Request $request)
    {
        $data = $request->validate([
            'nom_categoria' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categorias', 'nom_categoria')->whereNull('deleted_at') // Solo cuenta productos activos
            ],
            'id_icono'      => 'required|exists:iconos,id_icono',
            'id_color'      => 'required|exists:colors,id_color'
        ]);

        $data['est_categoria'] = Categoria::ACTIVO;
        $categoria = Categoria::create($data);

        return ApiResponse::created($categoria, 'Categoría registrada correctamente');
    }

    public function eliminarCategoria($id_categoria){
        $categoria = Categoria::find($id_categoria);

        if(!$categoria){
            return ApiResponse::notFound("No se encontró una categoria para este id: $id_categoria"); 
        }

        $categoria->delete();

        return ApiResponse::ok(null, "Categoria eliminada correctamente");
    }

    public function obtenerCategoriaPorId($id_categoria){
        $categoria = Categoria::select("id_categoria", "id_icono", "id_color", "nom_categoria", "est_categoria")
                            ->with([
                                'icono:id_icono,nom_icono,cod_icono',
                                'color:id_color,nom_color,hex_color'
                            ])                    
                            ->find($id_categoria); // Devuelve un objeto o null                          

        if(!$categoria){
            return ApiResponse::notFound("No se encontró una categoria para este id: $id_categoria"); 
        }

        return ApiResponse::ok($categoria, "Categoría encontrada"); 
    }

    public function actualizarCategoria(Request $request, $id_categoria)
    {
        $categoria = Categoria::find($id_categoria); 

        if(!$categoria){
            return ApiResponse::notFound("No se encontró una categoría para este id: $id_categoria");
        }

        $data = $request->validate([
            'nom_categoria' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categorias', 'nom_categoria')
                    ->ignore($id_categoria, 'id_categoria')
                    ->whereNull('deleted_at')
            ],
            'id_icono'      => 'required|exists:iconos,id_icono',
            'id_color'      => 'required|exists:colors,id_color',
            'est_categoria' => 'required|integer|in:0,1'
        ]);

        $categoria->update($data);

        return ApiResponse::ok($categoria, "Categoría actualizada correctamente");
    }

    public function listarCategoriasEstado($estado)
    {
        $categorias = Categoria::select("id_categoria", "nom_categoria", "est_categoria")
                            ->withCount("producto")
                            ->where("est_categoria", $estado)
                            ->get();

        if ($categorias->isEmpty()) {
            return ApiResponse::notFound("No se encontraron categorías");
        }

        return ApiResponse::ok($categorias, 'Categorías listadas por estado');
    }
}
