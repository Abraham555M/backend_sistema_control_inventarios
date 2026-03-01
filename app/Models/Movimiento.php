<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $table = 'movimientos';

    protected $primaryKey = 'id_movimiento';

    protected $fillable = [
        'fch_movimiento',
        'obs_movimiento',
        'est_movimiento',
        'id_tipo_movimiento',
        'id_usuario',
        'id_cliente',
        'id_proveedor',
        'id_orden_compra'
    ];

    protected $casts = [
        'fch_movimiento' => 'date',
        'est_movimiento' => 'integer',
    ];

    /**
     * Relaciones
     */
    public function tipoMovimiento()
    {
        return $this->belongsTo(
            TipoMovimiento::class,
            'id_tipo_movimiento',
            'id_tipo_movimiento'
        );
    }

    public function usuario()
    {
        return $this->belongsTo(
            User::class,
            'id_usuario',
            'id'
        );
    }

    public function cliente()
    {
        return $this->belongsTo(
            Cliente::class,
            'id_cliente',
            'id_cliente'
        );
    }

    public function proveedor()
    {
        return $this->belongsTo(
            Proveedor::class,
            'id_proveedor',
            'id_proveedor'
        );
    }

    public function ordenCompra()
    {
        return $this->belongsTo(
            OrdenCompra::class,
            'id_orden_compra',
            'id_orden_compra'
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
}
