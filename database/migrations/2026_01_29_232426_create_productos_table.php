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
        Schema::create('productos', function (Blueprint $table) {
            $table->id("id_producto");
            $table->string("cod_producto", 10)->unique();
            $table->string("nom_producto", 200); 
            $table->text("des_producto")->nullable();
            $table->decimal('stk_min_producto', 10, 3);
            $table->tinyInteger("est_producto")->default(1); 

            $table->unsignedBigInteger('id_unidad_medida');
            $table->foreign('id_unidad_medida')->references('id_unidad_medida')->on('unidad_medidas')->cascadeOnDelete();
            
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->cascadeOnDelete();          
               
            $table->unsignedBigInteger('id_marca');
            $table->foreign('id_marca')->references('id_marca')->on('marcas')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
