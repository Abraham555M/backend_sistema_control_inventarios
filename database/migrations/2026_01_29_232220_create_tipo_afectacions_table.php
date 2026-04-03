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
        Schema::create('afectaciones', function (Blueprint $table) {
            $table->id('id_afectacion'); 
            $table->string('cod_sun_afectacion', 10); 
            $table->string('nom_afectacion', 150);  
            $table->decimal('por_afectacion', 5, 2); 
            $table->tinyInteger('est_afectacion')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_afectacions');
    }
};
