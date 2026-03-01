<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMovimiento extends Model
{
    use HasFactory; 

    protected $table = "tipo_movimientos";

    protected $primaryKey = 'id_tipo_movimiento';

    protected $fillable = [
        "nom_tipo_movimiento",
        "est_tipo_movimiento"
    ];

    /**
     * Relaciones
     */
    public function movimiento()
    {
        return $this->hasMany(
            Movimiento::class,
            'id_movimiento',
            'id_movimiento'
        );
    }
}
