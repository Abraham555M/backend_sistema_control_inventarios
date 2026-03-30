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
        Schema::create('iconos', function (Blueprint $table) {
            $table->id("id_icono");
            $table->string("nom_icono");
            $table->string("cod_icono", 20)->unique();
            $table->tinyInteger("est_icono")->default(1); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iconos');
    }
};
