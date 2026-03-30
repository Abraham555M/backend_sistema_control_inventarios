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
        Schema::create('devolucion_detalles', function (Blueprint $table) {
            $table->id("id_devolucion_detalle");
            $table->decimal("can_devolucion_detalle", 10, 2);
            $table->decimal("pre_devolucion_detalle", 10, 2);
            $table->text("mot_devolucion_detalle", 200); 

            $table->unsignedBigInteger("id_devolucion");
            $table->foreign("id_devolucion")->references("id_devolucion")->on("devoluciones");

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
        Schema::dropIfExists('devolucion_detalles');
    }
};
