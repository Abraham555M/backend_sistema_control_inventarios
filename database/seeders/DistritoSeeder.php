<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('distritos')->insert([
            ['nom_distrito' => 'Lima',             'ubg_distrito' => '150101', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'Ancón',            'ubg_distrito' => '150102', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'Ate',              'ubg_distrito' => '150103', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'Barranco',         'ubg_distrito' => '150104', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'Breña',            'ubg_distrito' => '150105', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'Carabayllo',       'ubg_distrito' => '150106', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'Chaclacayo',       'ubg_distrito' => '150107', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'Chorrillos',       'ubg_distrito' => '150108', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'Cieneguilla',      'ubg_distrito' => '150109', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'Comas',            'ubg_distrito' => '150110', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'El Agustino',      'ubg_distrito' => '150111', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'Independencia',    'ubg_distrito' => '150112', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'Jesús María',      'ubg_distrito' => '150113', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'La Molina',        'ubg_distrito' => '150114', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'La Victoria',      'ubg_distrito' => '150115', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'Lince',            'ubg_distrito' => '150116', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'Los Olivos',       'ubg_distrito' => '150117', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'Lurigancho',       'ubg_distrito' => '150118', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'Lurín',            'ubg_distrito' => '150119', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['nom_distrito' => 'Magdalena del Mar','ubg_distrito' => '150120', 'est_distrito' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
