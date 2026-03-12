<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoMovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_movimientos')->insert([
            ['nom_tipo_movimiento' => 'Compra',                'est_tipo_movimiento' => 1],
            ['nom_tipo_movimiento' => 'Venta',                 'est_tipo_movimiento' => 1],
            ['nom_tipo_movimiento' => 'Traslado entre almacenes', 'est_tipo_movimiento' => 1],
            ['nom_tipo_movimiento' => 'Devolución de compra',  'est_tipo_movimiento' => 1],
            ['nom_tipo_movimiento' => 'Devolución de venta',   'est_tipo_movimiento' => 1]
        ]);
    }
}
