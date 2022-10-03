<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Detalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Detalle', function (Blueprint $table) {

            $table->string('ResponsableCedula', 10);

            $table->foreign('ResponsableCedula')->references('Cedula')->on('Responsable')->onDelete('cascade');

            $table->integer('EquipoSecuencial')->unsigned();

            $table->foreign('EquipoSecuencial')->references('Secuencial')->on('Equipos')->onDelete('cascade');

            $table->integer('AccesoriosSecuencial')->unsigned();

            $table->foreign('AccesoriosSecuencial')->references('Secuencial')->on('Accesorios')->onDelete('cascade');

            $table->string('FechaEntrega', 50);

            $table->string('FechaDevolucion', 50)->nullable();

            $table->tinyInteger('Activo');

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
