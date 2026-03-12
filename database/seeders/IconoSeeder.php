<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IconoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('iconos')->insert([
            ['nom_icono' => 'Usuario',       'cod_icono' => 'fa-user',      'est_icono' => 1],
            ['nom_icono' => 'Configuración', 'cod_icono' => 'fa-cog',       'est_icono' => 1],
            ['nom_icono' => 'Inicio',        'cod_icono' => 'fa-home',      'est_icono' => 1],
            ['nom_icono' => 'Buscar',        'cod_icono' => 'fa-search',    'est_icono' => 1],
            ['nom_icono' => 'Eliminar',      'cod_icono' => 'fa-trash',     'est_icono' => 1],
            ['nom_icono' => 'Editar',        'cod_icono' => 'fa-edit',      'est_icono' => 1],
            ['nom_icono' => 'Guardar',       'cod_icono' => 'fa-save',      'est_icono' => 1],
            ['nom_icono' => 'Imprimir',      'cod_icono' => 'fa-print',     'est_icono' => 1],
            ['nom_icono' => 'Reporte',       'cod_icono' => 'fa-chart-bar', 'est_icono' => 1],
        ]);
    }
}
