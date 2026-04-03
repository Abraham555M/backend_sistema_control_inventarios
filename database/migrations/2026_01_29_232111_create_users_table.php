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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');

            // Datos personales
            $table->string('nom_usuario', 100);
            $table->string('ape_usuario', 100);
            $table->string('img_usuario')->nullable();
            $table->tinyInteger('est_usuario')->default(1);

            // Autenticación
            $table->string('pas_usuario');
            $table->string('ema_usuario')->unique();

            // Foreign key constraints
            $table->unsignedInteger('id_genero');
            $table->foreign('id_genero')->references('id_genero')->on('generos');

            $table->unsignedInteger('id_rol_usuario');
            $table->foreign('id_rol_usuario')->references('id_rol_usuario')->on('rol_usuarios');

            $table->unsignedInteger('id_sucursal')->nullable();
            $table->foreign('id_sucursal')->references('id_sucursal')->on('sucursales');


            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('ema_usuario')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('password_reset_tokens');
    }
};
