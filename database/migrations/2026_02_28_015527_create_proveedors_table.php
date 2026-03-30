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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id("id_proveedor");
            $table->string("nom_proveedor", 150);
            $table->string("num_doc_proveedor", 20);
            $table->string("cod_proveedor", 10)->unique();
            $table->string("ruc_proveedor", 11)->unique();
            $table->string("dir_proveedor", 150);
            $table->string("tel_proveedor", 15)->nullable(); 
            $table->string("cnt_proveedor", 150)->nullable();
            $table->tinyInteger("est_proveedor")->default(1);

            $table->unsignedBigInteger('id_documento');
            $table->foreign('id_documento')->references('id_documento')->on('tipo_documentos')->cascadeOnDelete();

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
