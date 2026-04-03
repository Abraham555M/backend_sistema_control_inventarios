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
        Schema::create('color_entidades', function (Blueprint $table) {
            $table->id("id_color_entidad");
            $table->string("nom_entidad_color_entidad");
            $table->tinyInteger("est_color_entidad")->default(1); 
            
            $table->unsignedBigInteger('id_color');
            $table->foreign('id_color')->references('id_color')->on('colores')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_entidads');
    }
};
