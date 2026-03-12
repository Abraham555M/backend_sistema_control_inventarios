<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnidadMedida extends Model
{
    use HasFactory, SoftDeletes; 

    protected $table = "unidad_medidas";
    
    protected $primaryKey = 'id_unidad_medida';

    protected $fillable = [
        "nom_unidad_medida",
        "abr_unidad_medida",
        "est_unidad_medida"
    ];

     protected $casts = [
        'est_unidad_medida' => 'integer',
    ];

    public const ACTIVO = 1; 
    public const INACTIVO = 0; 

    public function scopeActivas($query){
        return $query->where('est_unidad_medida', self::ACTIVO);
    }

    public function scopeInactivas($query){
        return $query->where('est_unidad_medida', self::INACTIVO); 
    }

    /**
     * Relaciones
     */
    public function productos()
    {
        return $this->hasMany(
            Producto::class,
            'id_unidad_medida',
            'id_unidad_medida'
        );
    }
}
