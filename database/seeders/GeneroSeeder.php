<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('generos')->insert([
            ['nom_genero' => 'Masculino',            'est_genero' => 1],
            ['nom_genero' => 'Femenino',             'est_genero' => 1],
            ['nom_genero' => 'Prefiero no especificar', 'est_genero' => 1],
        ]);
    }
}
