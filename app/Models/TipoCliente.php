<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model
{
    use HasFactory; 

    protected $table = 'tipo_clientes';

    protected $primaryKey = 'id_tipo_cliente';

    protected $fillable = [
        'nom_tipo_cliente',
        'est_tipo_cliente'
    ];

     /**
     * Casts de atributos
     */
    protected $casts = [
        'est_tipo_cliente' => 'integer'
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
        return $query->where('est_tipo_cliente', self::ACTIVO);
    }

    /**
     * Scope: solo marcas inactivas
     */
    public function scopeInactivas($query)
    {
        return $query->where('est_tipo_cliente', self::INACTIVO);
    }

    /**
     * Relaciones
     */
    public function cliente()
    {
        return $this->hasMany(
            Cliente::class,
            'id_cliente',
            'id_cliente'
        );
    }
}
