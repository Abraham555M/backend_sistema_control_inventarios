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
