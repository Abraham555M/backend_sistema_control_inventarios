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
        Schema::create('producto_almacens', function (Blueprint $table) {
            $table->id("id_producto_almacen");
            $table->decimal("stk_act_producto_almacen", 10, 3);
            $table->decimal("stk_res_producto_almacen", 10, 3);

            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->cascadeOnDelete();

            $table->unsignedBigInteger('id_almacen');
            $table->foreign('id_almacen')->references('id_almacen')->on('almacens')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_almacens');
    }
};
