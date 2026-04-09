<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoAfectacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('afectaciones')->insert([
            [
                'cod_sun_afectacion' => '10',
                'nom_afectacion' => 'Gravado - Operación Onerosa',
                'por_afectacion' => 18.00,
                'est_afectacion' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod_sun_afectacion' => '20',
                'nom_afectacion' => 'Exonerado - Operación Onerosa',
                'por_afectacion' => 0.00,
                'est_afectacion' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod_sun_afectacion' => '30',
                'nom_afectacion' => 'Inafecto - Operación Onerosa',
                'por_afectacion' => 0.00,
                'est_afectacion' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cod_sun_afectacion' => '40',
                'nom_afectacion' => 'Exportación',
                'por_afectacion' => 0.00,
                'est_afectacion' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
