<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    use HasFactory; 

    protected $table = 'orden_compras';

    protected $primaryKey = 'id_orden_compra';

    protected $fillable = [
        'cod_orden_compra',
        'fch_orden_compra',
        'fch_ent_esp_orden_compra',
        'obs_orden_compra',
        'mto_sub_total_orden_compra',
        'mto_igv_orden_compra',
        'mto_total_orden_compra',
        'est_orden_compra',
        'id_proveedor',
        'id_usuario',
        'id_almacen'
    ];

     /**
     * Casts de atributos
     */
    protected $casts = [
        'est_orden_compra' => 'integer',
        'fch_ent_esp_orden_compra' => 'date',
        'fch_orden_compra' => 'date'
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
        return $query->where('est_orden_compra', self::ACTIVO);
    }

    /**
     * Scope: solo marcas inactivas
     */
    public function scopeInactivas($query)
    {
        return $query->where('est_orden_compra', self::INACTIVO);
    }

    /**
     * Relaciones
     */
    public function proveedor()
    {
        return $this->belongsTo(
            Proveedor::class,
            'id_proveedor',
            'id_proveedor'
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

    public function almacen()
    {
        return $this->belongsTo(
            Almacen::class,
            'id_almacen',
            'id_almacen'
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
