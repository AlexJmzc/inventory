<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProgramaEquipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProgramaEquipo', function (Blueprint $table) {

            $table->integer('SecuencialEquipo')->unsigned();

            $table->foreign('SecuencialEquipo')->references('Secuencial')->on('Equipos')->onDelete('cascade');

            $table->integer('SecuencialPrograma')->unsigned();

            $table->foreign('SecuencialPrograma')->references('Secuencial')->on('Programas')->onDelete('cascade');

            $table->integer('Bits')->unsigned();

            $table->foreign('Bits')->references('Secuencial')->on('TipoBits')->onDelete('cascade');

            $table->tinyInteger('Licencia');

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
