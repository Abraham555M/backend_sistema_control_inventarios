<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoAlmacen extends Model
{
   use HasFactory;

    protected $table = "producto_almacens";

    protected $primaryKey = "id_producto_almacen";

    protected $fillable = [
        "stk_act_producto_almacen",
        "stk_res_producto_almacen",
        "id_producto",
        "id_almacen"
    ];

    /**
     * Relaciones
     */
    public function producto()
    {
        return $this->belongsTo(
            Producto::class,
            'id_producto',
            'id_producto'
        );
    }

    public function almacen()
    {
        return $this->belongsTo(
            Almacen::class,
            'id_almacen',
            'id_almacen'
        );
    }
}
