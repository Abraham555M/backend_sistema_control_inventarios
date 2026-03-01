<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory; 

    protected $table = "almacens";

    protected $primaryKey = 'id_almacen';

    protected $fillable = [
        "cod_almacen",
        "nom_almacen",
        "dir_almacen",
        "est_almacen"
    ];

    protected $casts = [
        "est_almacen" => "integer"
    ];

    public const ACTIVO   = 1;
    public const INACTIVO = 0;

    public function scopeActivas($query)
    {
        return $query->where('est_almacen', self::ACTIVO);
    }

    public function scopeInactivas($query)
    {
        return $query->where('est_almacen', self::INACTIVO);
    }

    /**
     * Relaciones
     */
    public function productoAlmacen()
    {
        return $this->hasMany(
            ProductoAlmacen::class,
            'id_producto_almacen',
            'id_producto_almacen'
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

    public function ubicacion()
    {
        return $this->hasMany(
            Ubicacion::class,
            'id_ubicacion',
            'id_ubicacion'
        );
    }

    public function ordenCompra()
    {
        return $this->hasMany(
            OrdenCompra::class,
            'id_orden_compra',
            'id_orden_compra'
        );
    }

}
