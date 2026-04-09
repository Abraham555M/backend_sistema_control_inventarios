<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoComprobanteSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = [
            ['cod_tip_comprobante' => '01', 'nom_tipo_comprobante' => 'Factura', 'est_tipo_comprobante' => 1],
            ['cod_tip_comprobante' => '03', 'nom_tipo_comprobante' => 'Boleta de Venta', 'est_tipo_comprobante' => 1],
            ['cod_tip_comprobante' => '07', 'nom_tipo_comprobante' => 'Nota de Crédito', 'est_tipo_comprobante' => 1],
            ['cod_tip_comprobante' => 'NV', 'nom_tipo_comprobante' => 'Nota de Venta', 'est_tipo_comprobante' => 1],
            ['cod_tip_comprobante' => 'OC', 'nom_tipo_comprobante' => 'Orden de Compra', 'est_tipo_comprobante' => 1],
        ];

        DB::table('tipo_comprobantes')->insert($tipos);
    }
}