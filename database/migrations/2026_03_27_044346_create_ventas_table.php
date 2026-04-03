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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id("id_venta");
            $table->string("ser_com_venta", 5)->unique();
            $table->string("num_com_venta", 10)->unique();
            $table->dateTime("fch_venta");
            $table->text("obs_venta")->nullable();
            $table->decimal("mto_sub_venta", 12, 2);
            $table->decimal("mto_igv_venta", 12, 2);
            $table->tinyInteger("est_venta")->default(1);
            
            $table->unsignedBigInteger("id_cliente");
            $table->foreign("id_cliente")->references("id_cliente")->on("clientes");

            $table->unsignedBigInteger("id_usuario");
            $table->foreign("id_usuario")->references("id_usuario")->on("usuarios");

            $table->unsignedBigInteger("id_sucursal");
            $table->foreign("id_sucursal")->references("id_sucursal")->on("sucursales");

            $table->unsignedBigInteger("id_tipo_comprobante");
            $table->foreign("id_tipo_comprobante")->references("id_tipo_comprobante")->on("tipo_comprobantes");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
