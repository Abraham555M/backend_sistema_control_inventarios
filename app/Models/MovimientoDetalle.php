<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoDetalle extends Model
{
    use HasFactory;

    protected $table = 'movimiento_detalles';

    protected $primaryKey = 'id_movimiento_detalle';

    protected $fillable = [
        'can_movimiento_detalle',
        'id_movimiento',
        'id_producto',
        'id_almacen',
        'id_ubicacion'
    ];

    public function movimiento()
    {
        return $this->belongsTo(
            Movimiento::class,
            'id_movimiento',
            'id_movimiento'
        );
    }

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

    public function ubicacion()
    {
        return $this->belongsTo(
            Ubicacion::class,
            'id_ubicacion',
            'id_ubicacion'
        );
    }
}
