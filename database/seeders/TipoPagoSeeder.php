<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPagoSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = [
            ['nom_tipo_pago' => 'Efectivo',                'est_tipo_pago' => 1],
            ['nom_tipo_pago' => 'Tarjeta de Débito',       'est_tipo_pago' => 1],
            ['nom_tipo_pago' => 'Tarjeta de Crédito',      'est_tipo_pago' => 1],
            ['nom_tipo_pago' => 'Transferencia Bancaria',  'est_tipo_pago' => 1],
            ['nom_tipo_pago' => 'Yape',                    'est_tipo_pago' => 1],
            ['nom_tipo_pago' => 'Plin',                    'est_tipo_pago' => 1],
            ['nom_tipo_pago' => 'Crédito',                 'est_tipo_pago' => 1],
            ['nom_tipo_pago' => 'Cheque',                  'est_tipo_pago' => 1],
        ];

        DB::table('tipo_pagos')->insert($tipos);
    }
}