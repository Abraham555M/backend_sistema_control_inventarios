<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    protected $table = 'ubicacions';

    protected $primaryKey = 'id_ubicacion';

    protected $fillable = [
        'cod_ubicacion',
        'des_ubicacion',
        'est_ubicacion',
        'id_almacen'
    ];

    protected $casts = [
        'est_ubicacion' => 'integer',
    ];

    public const ACTIVO = 1; 
    public const INACTIVO = 0; 

    public function scopeActivas($query){
        return $query->where('est_ubicacion', self::ACTIVO);
    }

    public function scopeInactivas($query){
        return $query->where('est_ubicacion', self::INACTIVO); 
    }

    /**
     * Relaciones
     */
    public function almacen()
    {
        return $this->belongsTo(
            Almacen::class,
            'id_almacen',
            'id_almacen'
        );
    }
}
