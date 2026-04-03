<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('paises')->insert([
            ['nom_pais' => 'Perú',          'iso2_pais' => 'PE', 'iso3_pais' => 'PER', 'est_pais' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_pais' => 'Estados Unidos', 'iso2_pais' => 'US', 'iso3_pais' => 'USA', 'est_pais' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_pais' => 'China',          'iso2_pais' => 'CN', 'iso3_pais' => 'CHN', 'est_pais' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_pais' => 'Alemania',       'iso2_pais' => 'DE', 'iso3_pais' => 'DEU', 'est_pais' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_pais' => 'Japón',          'iso2_pais' => 'JP', 'iso3_pais' => 'JPN', 'est_pais' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_pais' => 'Brasil',         'iso2_pais' => 'BR', 'iso3_pais' => 'BRA', 'est_pais' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_pais' => 'México',         'iso2_pais' => 'MX', 'iso3_pais' => 'MEX', 'est_pais' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_pais' => 'España',         'iso2_pais' => 'ES', 'iso3_pais' => 'ESP', 'est_pais' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_pais' => 'Italia',         'iso2_pais' => 'IT', 'iso3_pais' => 'ITA', 'est_pais' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_pais' => 'Corea del Sur',  'iso2_pais' => 'KR', 'iso3_pais' => 'KOR', 'est_pais' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_pais' => 'India',          'iso2_pais' => 'IN', 'iso3_pais' => 'IND', 'est_pais' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_pais' => 'Chile',          'iso2_pais' => 'CL', 'iso3_pais' => 'CHL', 'est_pais' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_pais' => 'Argentina',      'iso2_pais' => 'AR', 'iso3_pais' => 'ARG', 'est_pais' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_pais' => 'Colombia',       'iso2_pais' => 'CO', 'iso3_pais' => 'COL', 'est_pais' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_pais' => 'Canadá',         'iso2_pais' => 'CA', 'iso3_pais' => 'CAN', 'est_pais' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
