<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evento');
            $table->foreign('evento')->references('id')->on('eventos'); // Asocia el ID de la tabla 'eventos'
            // $table->foreign('evento')->references('id')->on('eventos')->onDelete('cascade'); // Para eliminar el evento y asistentes a la vez
            $table->bigInteger('cedula')->unique();
            $table->string('nombre');
            $table->string('correo');
            $table->string('celular');
            $table->unsignedBigInteger('ubicacion')->nullable(); // Opción select
            $table->foreign('ubicacion')->references('id')->on('lugares'); // Asocia el ID de la tabla 'lugares'
            $table->string('ubicacion_otra')->nullable(); // Input de texto
            $table->string('asistio');
            $table->string('aceptacion'); // Radio button (Si Acepto o No Acepto)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistentes');
    }
};
