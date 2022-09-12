<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mantenimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Mantenimiento', function (Blueprint $table) {
            $table->string('ResponsableCedula', 10);
            $table->foreign('ResponsableCedula')->references('Cedula')->on('Responsable')->onDelete('cascade');
            $table->integer('EquiposSecuencial');
            $table->foreign('EquiposSecuencial')->references('Secuencial')->on('Equipos')->onDelete('cascade');
            $table->string('FechaMantenimiento', 50);
            $table->string('Observacion', 100);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
