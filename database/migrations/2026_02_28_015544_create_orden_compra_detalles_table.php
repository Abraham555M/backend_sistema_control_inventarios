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
        Schema::create('orden_compra_detalles', function (Blueprint $table) {
            $table->id("id_orden_compra_detalle");
            $table->decimal("can_sol_orden_compra_detalle", 10, 2); 
            $table->decimal("can_rec_orden_compra_detalle", 10, 2)->default(0);
            $table->decimal("pre_uni_orden_compra_detalle", 10, 2); 
            // $table->decimal("mto_sub_total_orden_compra_detalle", 10, 2);
            $table->tinyInteger("est_orden_compra_detalle")->default(1);

            $table->unsignedBigInteger('id_orden_compra');
            $table->foreign('id_orden_compra')->references('id_orden_compra')->on('orden_compras')->cascadeOnDelete();

            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->cascadeOnDelete();
            
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_compra_detalles');
    }
};
