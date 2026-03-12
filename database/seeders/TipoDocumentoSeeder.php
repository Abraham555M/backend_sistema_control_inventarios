<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_documentos')->insert([
            ['nom_tipo_documento' => 'DNI',                'est_tipo_documento' => 1],
            ['nom_tipo_documento' => 'RUC',                'est_tipo_documento' => 1],
            ['nom_tipo_documento' => 'Pasaporte',          'est_tipo_documento' => 1],
            ['nom_tipo_documento' => 'Carnet de Extranjería', 'est_tipo_documento' => 1],
        ]);
    }
}
