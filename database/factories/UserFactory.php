<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'nom_usuario'    => fake()->firstName(),
            'ape_usuario'    => fake()->lastName(),
            'ema_usuario'    => fake()->unique()->safeEmail(),
            'pas_usuario'    => static::$password ??= Hash::make('password'), // El valor siempre es 'password' 
            'est_usuario'    => 1,
            'id_genero'      => \App\Models\Genero::inRandomOrder()->value('id_genero'),
            'id_rol_usuario' => \App\Models\RolUsuario::inRandomOrder()->value('id_rol_usuario'),
            'id_sucursal'    => null,
            'img_usuario'    => null,
        ];
    }
}