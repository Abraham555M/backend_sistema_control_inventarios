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
        Schema::create('ubicacions', function (Blueprint $table) {
            $table->id("id_ubicacion");
            $table->string("cod_ubicacion",10)->unique(); 
            $table->text("des_ubicacion", 200)->nullable(); 
            $table->tinyInteger("est_ubicacion")->default(1); 
       
            $table->unsignedBigInteger('id_almacen');
            $table->foreign('id_almacen')->references('id_almacen')->on('almacens')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ubicacions');
    }
};
