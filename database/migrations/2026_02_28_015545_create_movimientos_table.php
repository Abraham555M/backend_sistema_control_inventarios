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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id("id_movimiento");
            $table->date("fch_movimiento");
            $table->text("obs_movimiento")->nullable();
            $table->tinyInteger("est_movimiento")->default(1);

            $table->unsignedBigInteger('id_tipo_movimiento');
            $table->foreign('id_tipo_movimiento')->references('id_tipo_movimiento')->on('tipo_movimientos')->cascadeOnDelete();

            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users')->cascadeOnDelete();

            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->cascadeOnDelete();

            $table->unsignedBigInteger('id_proveedor');
            $table->foreign('id_proveedor')->references('id_proveedor')->on('proveedors')->cascadeOnDelete();

            $table->unsignedBigInteger('id_orden_compra');
            $table->foreign('id_orden_compra')->references('id_orden_compra')->on('orden_compras')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
