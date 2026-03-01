<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompraDetalle extends Model
{
    use HasFactory; 

    protected $table = 'orden_compra_detalles';

    protected $primaryKey = 'id_orden_compra_detalle';

    protected $fillable = [
        'can_sol_orden_compra_detalle',
        'can_rec_orden_compra_detalle',
        'pre_uni_orden_compra_detalle',
        'mto_sub_total_orden_compra_detalle',
        'est_orden_compra_detalle',
        'id_orden_compra',
        'id_producto'        
    ];

     /**
     * Casts de atributos
     */
    protected $casts = [
        'est_orden_compra_detalle' => 'integer'      
    ];

    /**
     * Valores constantes de estado
     */
    public const ACTIVO   = 1;
    public const INACTIVO = 0;

    /**
     * Scope: solo marcas activas
     */
    public function scopeActivas($query)
    {
        return $query->where('est_orden_compra_detalle', self::ACTIVO);
    }

    /**
     * Scope: solo marcas inactivas
     */
    public function scopeInactivas($query)
    {
        return $query->where('est_orden_compra_detalle', self::INACTIVO);
    }

    /**
     * Relaciones
     */
    public function ordenCompra()
    {
        return $this->belongsTo(
            OrdenCompra::class,
            'id_orden_compra',
            'id_orden_compra'
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
}
