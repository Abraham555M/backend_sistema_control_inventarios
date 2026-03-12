<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marca extends Model
{
    use HasFactory, SoftDeletes; 

    protected $table = "marcas";

    protected $primaryKey = 'id_marca';

    protected $fillable = [
        "nom_marca",
        "est_marca",
        "id_pais"
    ];

     /**
     * Casts de atributos
     */
    protected $casts = [
        'est_marca' => 'integer'
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
        return $query->where('est_marca', self::ACTIVO);
    }

    /**
     * Scope: solo marcas inactivas
     */
    public function scopeInactivas($query)
    {
        return $query->where('est_marca', self::INACTIVO);
    }

    /**
     * Relaciones
     */
    public function productos()
    {
        return $this->hasMany(
            Producto::class,
            'id_marca',
            'id_marca'
        );
    }

    public function pais()
    {
        return $this->belongsTo(
            Pais::class,
            'id_pais',
            'id_pais'
        );
    }
}
