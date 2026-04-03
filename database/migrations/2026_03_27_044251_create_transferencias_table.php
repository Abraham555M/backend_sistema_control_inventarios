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
        Schema::create('transferencias', function (Blueprint $table) {
            $table->id("id_transferencia");
            $table->string("cod_transferencia", 10)->unique();
            $table->date("fch_sol_transferencia");
            $table->date("fch_rec_transferencia")->nullable();
            $table->text("obs_transferencia")->nullable();
            $table->tinyInteger("est_transferencia")->default(1);

            $table->unsignedBigInteger("id_usuario_solicita");
            $table->foreign("id_usuario_solicita")->references("id_usuario")->on("usuarios");

            $table->unsignedBigInteger("id_usuario_recibe")->nullable();
            $table->foreign("id_usuario_recibe")->references("id_usuario")->on("usuarios");

            $table->unsignedBigInteger('id_almacen_origen');
            $table->foreign('id_almacen_origen')->references('id_almacen')->on('almacenes')->restrictOnDelete();

            $table->unsignedBigInteger('id_almacen_destino');
            $table->foreign('id_almacen_destino')->references('id_almacen')->on('almacenes')->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transferencias');
    }
};
