<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory; 

    protected $table = "generos";

    protected $primaryKey = 'id_genero';
    
    protected $fillable = [
        'nom_genero'
    ];

    /**
     * Relaciones
     */
    public function user()
    {
        return $this->hasMany(
            User::class,
            'id',
            'id'
        );
    }
}
