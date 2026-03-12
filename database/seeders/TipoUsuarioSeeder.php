<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_usuarios')->insert([
            ['nom_tipo_usuario' => 'Administrador', 'est_tipo_usuario' => 1],
            ['nom_tipo_usuario' => 'Vendedor',      'est_tipo_usuario' => 1],
            ['nom_tipo_usuario' => 'Almacenero',    'est_tipo_usuario' => 1],
            ['nom_tipo_usuario' => 'Supervisor',    'est_tipo_usuario' => 1],
        ]);
    }
}
