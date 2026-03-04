<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory, SoftDeletes; 

    protected $table = "categorias";

    protected $primaryKey = 'id_categoria';

    protected $fillable = [
        "nom_categoria",
        "est_categoria",
        "id_icono",
        "id_color"
    ];

    protected $casts = [
        "est_categoria" => "integer"
    ];

     /**
     * Valores constantes de estado
     */
    public const ACTIVO   = 1;
    public const INACTIVO = 0;

    public function scopeActivas($query)
    {
        return $query->where('est_categoria', self::ACTIVO);
    }

    public function scopeInactivas($query)
    {
        return $query->where('est_categoria', self::INACTIVO);
    }

    /**
     * Relaciones
     */
    public function productos()
    {
        return $this->hasMany(
            Producto::class,
            'id_categoria',
            'id_categoria'
        );
    }

    public function icono()
    {
        return $this->belongsTo(
            Icono::class,
            'id_icono',
            'id_icono'
        );
    }

    public function color()
    {
        return $this->belongsTo(
            Color::class,
            'id_color',
            'id_color'
        );
    }
}
