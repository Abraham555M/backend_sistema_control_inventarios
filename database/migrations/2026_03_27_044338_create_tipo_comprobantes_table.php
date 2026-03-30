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
        Schema::create('tipo_comprobantes', function (Blueprint $table) {
            $table->id("id_tipo_comprobante");
            $table->string("cod_tip_comprobante", 10);
            $table->string("nom_tipo_comprobante");
            $table->tinyInteger("est_tipo_comprobante")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_comprobantes');
    }
};
