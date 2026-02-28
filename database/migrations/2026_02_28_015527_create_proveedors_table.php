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
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id("id_proveedor");
            $table->string("nom_proveedor", 150);
            $table->string("cod_proveedor", 10)->unique();
            $table->string("ruc_proveedor", 11)->unique();
            $table->string("dir_proveedor", 150);
            $table->string("tel_proveedor", 15)->nullable(); 
            $table->tinyInteger("est_proveedor")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedors');
    }
};
