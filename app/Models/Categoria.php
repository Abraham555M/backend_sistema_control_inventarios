<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory; 

    protected $table = "categorias";

    protected $primaryKey = 'id_categoria';

    protected $fillable = [
        "nom_categoria",
        "est_categoria"
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
    public function producto()
    {
        return $this->hasMany(
            Producto::class,
            'id_producto',
            'id_producto'
        );
    }
}
