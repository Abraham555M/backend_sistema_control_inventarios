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
        Schema::create('almacens', function (Blueprint $table) {
            $table->id("id_almacen");
            $table->string("cod_almacen", 10)->unique();
            $table->string("nom_almacen", 100);
            $table->string("dir_almacen", 150)->nullable();
            $table->tinyInteger("est_almacen")->default(1);
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
