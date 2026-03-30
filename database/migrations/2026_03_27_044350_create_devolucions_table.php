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
        Schema::create('devoluciones', function (Blueprint $table) {
            $table->id("id_devolucion");
            $table->string("tip_devolucion"); // CLIENTE - PROVEEDOR 
            $table->string("cod_devolucion", 10)->unique();
            $table->date("fch_devolucion");
            $table->text("mot_devolucion")->nullable(); // MOTIVO
            $table->decimal("mto_tot_devolucion", 10, 2);
            $table->tinyInteger("est_devolucion")->default(1); 

            $table->unsignedBigInteger("id_usuario");
            $table->foreign("id_usuario")->references("id")->on("users");
            
            $table->unsignedBigInteger("id_almacen");
            $table->foreign("id_almacen")->references("id_almacen")->on("almacenes");

            $table->unsignedBigInteger("id_venta")->nullable();  // CASO SEA CLIENTE
            $table->foreign("id_venta")->references("id_venta")->on("ventas");

            $table->unsignedBigInteger("id_orden_compra")->nullable();  // CASO SEA PROVEEDOR
            $table->foreign("id_orden_compra")->references("id_orden_compra")->on("orden_compras");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devolucions');
    }
};
