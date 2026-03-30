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
            $table->date("cod_movimiento", 10)->unique();
            $table->date("fch_movimiento");
            $table->text("obs_movimiento")->nullable();
            $table->tinyInteger("est_movimiento")->default(1);

            $table->unsignedBigInteger('id_tipo_movimiento');
            $table->foreign('id_tipo_movimiento')->references('id_tipo_movimiento')->on('tipo_movimientos')->cascadeOnDelete();

            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users')->cascadeOnDelete();

            $table->unsignedBigInteger('id_almacen');
            $table->foreign('id_almacen')->references('id_almacen')->on('almacenes')->cascadeOnDelete();

            // Nullable
            $table->unsignedBigInteger('id_transferencia')->nullable();
            $table->foreign('id_transferencia')->references('id_transferencia')->on('transferencias')->cascadeOnDelete();

            $table->unsignedBigInteger('id_devolucion')->nullable();
            $table->foreign('id_devolucion')->references('id_devolucion')->on('devoluciones')->cascadeOnDelete();

            $table->unsignedBigInteger('id_orden_compra')->nullable();
            $table->foreign('id_orden_compra')->references('id_orden_compra')->on('orden_compras')->cascadeOnDelete();

            $table->unsignedBigInteger('id_venta')->nullable();
            $table->foreign('id_venta')->references('id_venta')->on('ventas')->cascadeOnDelete();

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
