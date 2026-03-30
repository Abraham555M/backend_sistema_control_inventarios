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
        Schema::create('transferencia_detalles', function (Blueprint $table) {
            $table->id("id_transferencia_detalle");
            $table->decimal("can_env_transferencia_detalle");   // CANTIDAD ENVIADA
            $table->decimal("can_rec_transferencia_detalle")->nullable();   // CANTIDAD RECIBIDA
            $table->text("obs_transferencia_detalle")->nullable();
            $table->tinyInteger("est_transferencia_detalle")->default(1);
            
            $table->unsignedBigInteger("id_transferencia");
            $table->foreign("id_transferencia")->references("id_transferencia")->on("transferencias"); 
            
            $table->unsignedBigInteger("id_producto");
            $table->foreign("id_producto")->references("id_producto")->on("productos"); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transferencia_detalles');
    }
};
