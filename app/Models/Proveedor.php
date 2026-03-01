<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory; 

    protected $table = 'proveedors';

    protected $primaryKey = 'id_proveedor';

    protected $fillable = [
        'nom_proveedor',
        'cod_proveedor',
        'ruc_proveedor',
        'ruc_proveedor',
        'tel_proveedor',
        'dir_proveedor',
        'cnt_proveedor',
        'est_proveedor'        
    ];

     /**
     * Casts de atributos
     */
    protected $casts = [
        'est_proveedor' => 'integer'
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
        return $query->where('est_proveedor', self::ACTIVO);
    }

    /**
     * Scope: solo marcas inactivas
     */
    public function scopeInactivas($query)
    {
        return $query->where('est_proveedor', self::INACTIVO);
    }

     /**
     * Relaciones
     */
    public function ordenCompra()
    {
        return $this->hasMany(
            Producto::class,
            'id_orden_compra',
            'id_orden_compra'
        );
    }

    public function movimiento()
    {
        return $this->hasMany(
            Producto::class,
            'id_movimiento',
            'id_movimiento'
        );
    }
}
