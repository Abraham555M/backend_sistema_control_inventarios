<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colores')->insert([
            ['nom_color' => 'Rojo',       'hex_color' => '#DC3545', 'est_color' => 1],
            ['nom_color' => 'Azul',       'hex_color' => '#0D6EFD', 'est_color' => 1],
            ['nom_color' => 'Verde',      'hex_color' => '#198754', 'est_color' => 1],
            ['nom_color' => 'Amarillo',   'hex_color' => '#FFC107', 'est_color' => 1],
            ['nom_color' => 'Naranja',    'hex_color' => '#FD7E14', 'est_color' => 1],
            ['nom_color' => 'Morado',     'hex_color' => '#6F42C1', 'est_color' => 1],
            ['nom_color' => 'Celeste',    'hex_color' => '#0DCAF0', 'est_color' => 1],
            ['nom_color' => 'Gris Oscuro','hex_color' => '#343A40', 'est_color' => 1],
            ['nom_color' => 'Gris Claro', 'hex_color' => '#6C757D', 'est_color' => 1],
            ['nom_color' => 'Negro',      'hex_color' => '#000000', 'est_color' => 1],
            ['nom_color' => 'Blanco',     'hex_color' => '#FFFFFF', 'est_color' => 1],
        ]);
    }
}
