<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table      = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'id_genero',
        'id_rol_usuario',
        'id_sucursal',
        'nom_usuario',
        'ape_usuario',
        'img_usuario',
        'est_usuario',
        'pas_usuario',
        'ema_usuario',
    ];

    protected $hidden = [
        'pas_usuario',
    ];

    protected function casts(): array
    {
        return [
            'est_usuario' => 'integer',
            'pas_usuario' => 'hashed',  // Encripta automáticamente al guardar
        ];
    }

    // Necesario para que Laravel Auth sepa dónde está la contraseña
    public function getAuthPassword(): string
    {
        return $this->pas_usuario;
    }

    // Necesario para que Sanctum/Auth sepa dónde está el email
    public function getEmailForPasswordReset(): string
    {
        return $this->ema_usuario;
    }

    // Relaciones
    public function rolUsuario()
    {
        return $this->belongsTo(RolUsuario::class, 'id_rol_usuario', 'id_rol_usuario');
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'id_sucursal', 'id_sucursal');
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_genero', 'id_genero');
    }

    public function transferencias(){
        return $this->hasMany(
            Transferencia::class,
            'id_usuario',
            'id_usuario'
        );
    }

    public function ventas(){
        return $this->hasMany(
            Venta::class,
            'id_usuario',
            'id_usuario'
        );
    }

    public function ordenCompras(){
        return $this->hasMany(
            OrdenCompra::class,
            'id_usuario',
            'id_usuario'
        );
    }

    public function pagos(){
        return $this->hasMany(
            Pago::class,
            'id_usuario',
            'id_usuario'
        );
    }

    public function movimientos(){
        return $this->hasMany(
            Movimiento::class,
            'id_usuario',
            'id_usuario'
        );
    }

    public function devoluciones(){
        return $this->hasMany(
            Devolucion::class,
            'id_usuario',
            'id_usuario'
        );
    }
}