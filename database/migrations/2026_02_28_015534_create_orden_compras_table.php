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
        Schema::create('orden_compras', function (Blueprint $table) {
            $table->id("id_orden_compra");
            $table->string("cod_orden_compra", 10)->unique();
            $table->date("fch_orden_compra");
            $table->date("fch_ent_esp_orden_compra"); //fecha entrega esperada 
            $table->text("obs_orden_compra")->nullable();
            $table->decimal("mto_sub_total_orden_compra", 10,2);
            $table->decimal("mto_igv_orden_compra", 10,2);
            $table->decimal("mto_total_orden_compra", 10,2);
            $table->tinyInteger("est_orden_compra")->default(1);

            $table->unsignedBigInteger('id_proveedor');
            $table->foreign('id_proveedor')->references('id_proveedor')->on('proveedors')->cascadeOnDelete();

            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users')->cascadeOnDelete();

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
        Schema::dropIfExists('orden_compras');
    }
};
