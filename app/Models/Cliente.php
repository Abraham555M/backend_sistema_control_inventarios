<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory; 

    protected $table = "clientes";

    protected $primaryKey = 'id_cliente';

    protected $fillable = [        
        "nom_cliente",
        "ape_cliente",
        "raz_soc_cliente",
        "tel_cliente",
        "ema_cliente",
        "est_cliente",
        "id_tipo_documento",
        "id_tipo_cliente",
    ];
    protected $casts = [
        "est_cliente" => "integer"
    ];

     /**
     * Valores constantes de estado
     */
    public const ACTIVO   = 1;
    public const INACTIVO = 0;

    public function scopeActivas($query)
    {
        return $query->where('est_cliente', self::ACTIVO);
    }

    public function scopeInactivas($query)
    {
        return $query->where('est_cliente', self::INACTIVO);
    }

    /**
     * Relaciones
     */
    public function movimiento()
    {
        return $this->hasMany(
            Producto::class,
            'id_movimiento',
            'id_movimiento'
        );
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(
            User::class,
            'id_tipo_documento',
            'id_tipo_documento'
        );
    }

    public function tipoCliente()
    {
        return $this->belongsTo(
            User::class,
            'id_tipo_cliente',
            'id_tipo_cliente'
        );
    }
}
