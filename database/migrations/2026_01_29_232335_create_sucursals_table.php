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
        Schema::create('sucursales', function (Blueprint $table) {
            $table->id('id_sucursal'); 
            $table->string('nom_sucursal', 150);
            $table->string('dir_sucursal', 200);
            $table->string('tel_sucursal', 9)->nullable();
            $table->tinyInteger('est_sucursal')->default(1); 

            $table->unsignedBigInteger("id_distrito");
            $table->foreign('id_distrito')->references('id_distrito')->on('distritos')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sucursals');
    }
};
