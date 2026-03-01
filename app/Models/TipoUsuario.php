<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory; 
    
    protected $table = "tipo_usuarios";

    protected $primaryKey = 'id_tipo_usuario';

    protected $fillable = [
        "nom_tipo_usuario"
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
