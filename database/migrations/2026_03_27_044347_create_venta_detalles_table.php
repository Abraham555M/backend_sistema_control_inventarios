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
        Schema::create('venta_detalles', function (Blueprint $table) {
            $table->id("id_venta_detalle");          
            $table->decimal("can_venta_detalle", 10, 2);
            $table->decimal("pre_uni_venta_detalle", 10, 2);
            $table->decimal("pct_des_venta_detalle", 5, 2)->default(0);
            $table->string("cod_tipo_afectacion", 5);
            $table->decimal("mto_igv_venta_detalle", 10, 2);
            $table->decimal("sub_tot_venta_detalle", 10, 2);
            $table->decimal("tot_venta_detalle", 10, 2);

            $table->unsignedBigInteger("id_venta");
            $table->foreign("id_venta")->references("id_venta")->on("ventas");

            $table->unsignedBigInteger("id_producto");
            $table->foreign("id_producto")->references("id_producto")->on("productos");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_detalles');
    }
};
