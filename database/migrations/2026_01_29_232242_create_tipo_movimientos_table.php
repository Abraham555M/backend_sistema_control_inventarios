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
        Schema::create('tipo_movimientos', function (Blueprint $table) {
            $table->id("id_tipo_movimiento");
            $table->string("nom_tipo_movimiento", 100);
            $table->tinyInteger("est_tipo_movimiento")->default(1); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_movimientos');
    }
};
