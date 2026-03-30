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
        Schema::create('almacenes', function (Blueprint $table) {
            $table->id("id_almacen");
            $table->string("cod_almacen", 10)->unique()->nullable();
            $table->string("nom_almacen", 100);
            $table->string("des_almacen", 150)->nullable();
            $table->tinyInteger("est_almacen")->default(1);

            $table->unsignedBigInteger("id_sucursal");
            $table->foreign('id_sucursal')->references('id_sucursal')->on('sucursales')->cascadeOnDelete();

            $table->unsignedBigInteger("id_icono");
            $table->foreign('id_icono')->references('id_icono')->on('iconos')->cascadeOnDelete();

            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('almacens');
    }
};
