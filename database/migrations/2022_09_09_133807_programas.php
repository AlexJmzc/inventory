<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Programas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Programas', function (Blueprint $table) {
            $table->integer('Secuencial')->primary();
            $table->integer('SecuencialEquipo');
            $table->foreign('SecuencialEquipo')->references('Secuencial')->on('Equipos')->onDelete('cascade');
            $table->string('Descripcion', 100)->nullable();
            $table->tinyInteger('Activo');
            $table->string('Nombre', 50);
            $table->string('Version', 50);
            $table->tinyInteger('Licencia');
            $table->integer('Bits');
            $table->foreign('Bits')->references('Secuencial')->on('TipoBits')->onDelete('cascade');
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
