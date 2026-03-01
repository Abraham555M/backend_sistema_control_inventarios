<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = "productos";

    protected $primaryKey = "id_producto";

    protected $fillable = [
        "cod_producto",
        "nom_producto",
        "des_producto",
        "stk_min_producto",
        "pre_cos_producto",
        "pre_ven_producto",
        "est_producto",
        "id_unidad_medida",
        "id_categoria",
        "id_marca"
    ];

     /**
     * Casts de atributos
     */

    protected $casts = [
        "est_producto" => "integer"
    ];

    public const ACTIVO = 1; 
    public const INACTIVO = 0; 

    public function unidadMedida()
    {
        return $this->belongsTo(
            UnidadMedida::class,
            'id_unidad_medida',
            'id_unidad_medida'
        );
    }

    public function categoria()
    {
        return $this->belongsTo(
            Categoria::class,
            'id_categoria',
            'id_categoria'
        ); 
    }

    public function marca()
    {
        return $this->belongsTo(
            Marca::class,
            'id_marca',
            'id_marca'
        ); 
    }

    public function movimientoDetalle()
    {
        return $this->hasMany(
            MovimientoDetalle::class,
            'id_movimiento_detalle',
            'id_movimiento_detalle'
        ); 
    }

    public function productoAlmacen()
    {
        return $this->hasMany(
            ProductoAlmacen::class,
            'id_producto_almacen',
            'id_producto_almacen'
        ); 
    }

    public function ordenCompraDetalle()
    {
        return $this->hasMany(
            OrdenCompraDetalle::class,
            'id_orden_compra_detalle',
            'id_orden_compra_detalle'
        ); 
    }
}
