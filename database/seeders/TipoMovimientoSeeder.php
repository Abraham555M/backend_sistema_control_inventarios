<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoMovimientoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tipo_movimientos')->insert([
            // ENTRADAS
            ['nom_tipo_movimiento' => 'Compra',                   'ent_tipo_movimiento' => 'ENTRADA',  'est_tipo_movimiento' => 1],
            ['nom_tipo_movimiento' => 'Devolución de venta',      'ent_tipo_movimiento' => 'ENTRADA',  'est_tipo_movimiento' => 1],
            ['nom_tipo_movimiento' => 'Traslado entre almacenes', 'ent_tipo_movimiento' => 'ENTRADA',  'est_tipo_movimiento' => 1],
            ['nom_tipo_movimiento' => 'Ajuste de inventario',     'ent_tipo_movimiento' => 'ENTRADA',  'est_tipo_movimiento' => 1],
            ['nom_tipo_movimiento' => 'Producción / Ensamblaje',  'ent_tipo_movimiento' => 'ENTRADA',  'est_tipo_movimiento' => 1],

            // SALIDAS
            ['nom_tipo_movimiento' => 'Venta',                    'ent_tipo_movimiento' => 'SALIDA',   'est_tipo_movimiento' => 1],
            ['nom_tipo_movimiento' => 'Devolución de compra',     'ent_tipo_movimiento' => 'SALIDA',   'est_tipo_movimiento' => 1],
            ['nom_tipo_movimiento' => 'Traslado entre almacenes', 'ent_tipo_movimiento' => 'SALIDA',   'est_tipo_movimiento' => 1],
            ['nom_tipo_movimiento' => 'Merma / Pérdida',          'ent_tipo_movimiento' => 'SALIDA',   'est_tipo_movimiento' => 1],
            ['nom_tipo_movimiento' => 'Consumo interno',          'ent_tipo_movimiento' => 'SALIDA',   'est_tipo_movimiento' => 1],
        ]);
    }
}