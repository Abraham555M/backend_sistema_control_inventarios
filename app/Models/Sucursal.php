<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sucursal extends Model
{
    use HasFactory, SoftDeletes; 

    protected $table = 'sucursales';

    protected $primaryKey = 'id_sucursal';

    protected $fillable = [
        'nom_sucursal',
        'dir_sucursal',
        'tel_sucursal',
        'est_sucursal',
        'id_distrito'        
    ];

     /**
     * Valores constantes de estado
     */
    public const ACTIVO   = 1;
    public const INACTIVO = 0;

    public function distrito()
    {
        return $this->belongsTo(
            Distrito::class,
            'id_distrito',
            'id_distrito'
        );
    }

    public function almacenes()
    {
        return $this->hasMany(
            Almacen::class,
            'id_sucursal',
            'id_sucursal'
        ); 
    }

    public function usuarios()
    {
        return $this->hasMany(
            User::class,
            'id_sucursal',
            'id_sucursal'
        ); 
    }

    public function ventas()
    {
        return $this->hasMany(
            Venta::class,
            'id_sucursal',
            'id_sucursal'
        ); 
    }
}
