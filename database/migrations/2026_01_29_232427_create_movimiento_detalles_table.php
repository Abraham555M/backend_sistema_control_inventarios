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
        Schema::create('movimiento_detalles', function (Blueprint $table) {
            $table->id("id_movimiento_detalle");
            $table->decimal("can_movimiento_detalle", 10, 3);
            
            $table->unsignedBigInteger('id_movimiento');
            $table->foreign('id_movimiento')->references('id_movimiento')->on('movimientos')->cascadeOnDelete();
            
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->cascadeOnDelete();
                          
            $table->unsignedBigInteger('id_almacen');
            $table->foreign('id_almacen')->references('id_almacen')->on('almacens')->cascadeOnDelete();
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimiento_detalles');
    }
};
