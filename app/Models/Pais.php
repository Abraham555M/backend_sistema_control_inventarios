<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
     use HasFactory; 

    protected $table = "paises";

    protected $primaryKey = 'id_pais';

    protected $fillable = [
        "nom_pais",
        "iso2_pais",
        "iso3_pais",
        "est_pais"
    ];

     /**
     * Casts de atributos
     */
    protected $casts = [
        'est_pais' => 'integer'
    ];   

    /**
     * Relaciones
     */
    public function marcas()
    {
        return $this->hasMany(
            Marca::class,
            'id_pais',
            'id_pais'
        );
    }
}
