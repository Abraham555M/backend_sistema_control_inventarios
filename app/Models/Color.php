<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory; 

    protected $table = "colores";

    protected $primaryKey = 'id_color';

    protected $fillable = [        
        "nom_color",
        "hex_color",
        "est_color"
    ];

    protected $casts = [
        "est_color" => "integer"
    ];

    /**
     * Relaciones
     */
    public function categorias()
    {
        return $this->hasMany(
            Categoria::class,
            'id_color',
            'id_color'
        );
    }

    public function colorEntidades()
    {
        return $this->hasMany(
            ColorEntidad::class,
            'id_color',
            'id_color'
        );
    }
}
