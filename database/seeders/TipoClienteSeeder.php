<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_clientes')->insert([
            ['nom_tipo_cliente' => 'Persona Natural', 'est_tipo_cliente' => 1],
            ['nom_tipo_cliente' => 'Empresa',         'est_tipo_cliente' => 1],
        ]);
    }
}
