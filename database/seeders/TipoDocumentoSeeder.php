<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tipo_documentos')->insert([
            ['cod_sun_documento' => '1',  'nom_documento' => 'DNI',                        'est_documento' => 1],
            ['cod_sun_documento' => '4',  'nom_documento' => 'Carnet de Extranjería',       'est_documento' => 1],
            ['cod_sun_documento' => '6',  'nom_documento' => 'RUC',                         'est_documento' => 1],
            ['cod_sun_documento' => '7',  'nom_documento' => 'Pasaporte',                   'est_documento' => 1],
            ['cod_sun_documento' => 'A',  'nom_documento' => 'Cédula Diplomática',          'est_documento' => 1],
            ['cod_sun_documento' => 'B',  'nom_documento' => 'Doc. Identidad País Residencia', 'est_documento' => 1],
            ['cod_sun_documento' => '0',  'nom_documento' => 'Sin Documento (varios)',      'est_documento' => 1],
        ]);
    }
}
