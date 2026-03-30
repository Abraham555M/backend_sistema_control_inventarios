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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id("id_categoria");
            $table->string("nom_categoria", 100);
            $table->tinyInteger('est_categoria')->default(1);
            
            $table->unsignedBigInteger('id_color');
            $table->foreign('id_color')->references('id_color')->on('colores')->restrictOnDelete();

            $table->unsignedBigInteger('id_icono');
            $table->foreign('id_icono')->references('id_icono')->on('iconos')->restrictOnDelete();
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
