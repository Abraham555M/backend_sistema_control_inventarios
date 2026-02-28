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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id("id_cliente");
            $table->string("nom_cliente", 100)->nullable();
            $table->string("ape_cliente", 100)->nullable();
            $table->string("raz_soc_cliente", 150)->nullable();
            $table->string("tel_cliente", 15)->nullable();
            $table->string("ema_cliente", 150)->unique()->nullable();
            $table->tinyInteger("est_cliente")->default(1);

            $table->unsignedBigInteger('id_tipo_documento');
            $table->foreign('id_tipo_documento')->references('id_tipo_documento')->on('tipo_documentos')->cascadeOnDelete();

            $table->unsignedBigInteger('id_tipo_cliente');
            $table->foreign('id_tipo_cliente')->references('id_tipo_cliente')->on('tipo_clientes')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
