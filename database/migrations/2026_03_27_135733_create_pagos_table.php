<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id("id_pago");
            $table->decimal("mto_pago", 10, 2);
            $table->string("num_pago", 30); // NUMERO DE OPERACION
            $table->date("fch_pago");
            $table->text("obs_pago", 200); 

            $table->unsignedBigInteger("id_venta");
            $table->foreign("id_venta")->references("id_venta")->on("ventas");

            $table->unsignedBigInteger("id_usuario");
            $table->foreign("id_usuario")->references("id")->on("users");

            $table->unsignedBigInteger("id_tipo_pago");
            $table->foreign("id_tipo_pago")->references("id_tipo_pago")->on("tipo_pagos");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
