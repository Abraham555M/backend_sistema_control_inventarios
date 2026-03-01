<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory; 

    protected $table = 'tipo_documentos';

    protected $primaryKey = 'id_tipo_documento';

    protected $fillable = [
        'nom_tipo_documento',
        'est_tipo_documento'
    ];

     /**
     * Casts de atributos
     */
    protected $casts = [
        'est_tipo_documento' => 'integer'
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
        return $query->where('est_tipo_documento', self::ACTIVO);
    }

    /**
     * Scope: solo marcas inactivas
     */
    public function scopeInactivas($query)
    {
        return $query->where('est_tipo_documento', self::INACTIVO);
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
