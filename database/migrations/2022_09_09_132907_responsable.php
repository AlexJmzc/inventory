<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Responsable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Responsable', function (Blueprint $table) {
            $table->string('Cedula', 10)->primary();
            $table->integer('SecuencialDepartamento');
            $table->foreign('SecuencialDepartamento')->references('Secuencial')->on('Departamento');
            $table->string('PrimerNombre', 50);
            $table->string('SegundoNombre', 50)->nullable();
            $table->string('ApellidoPaterno', 50);
            $table->string('ApellidoMaterno', 50)->nullable();
            $table->string('FechaNacimiento', 50);
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
