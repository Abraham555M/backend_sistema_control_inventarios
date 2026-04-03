<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icono extends Model
{
    use HasFactory; 

    protected $table = "iconos";

    protected $primaryKey = 'id_icono';

    protected $fillable = [        
        "nom_icono",
        "cod_icono",
        "est_icono"
    ];
    
    protected $casts = [
        "est_icono" => "integer"
    ];

    /**
     * Relaciones
     */
    public function categorias()
    {
        return $this->hasMany(
            Categoria::class,
            'id_icono',
            'id_icono'
        );
    }

    public function iconoEntidades()
    {
        return $this->hasMany(
            IconoEntidad::class,
            'id_icono',
            'id_icono'
        );
    }

    public function productos(){
        return $this->hasMany(
            Producto::class, 
            'id_producto',
            'id_producto'
        );
    }
}
