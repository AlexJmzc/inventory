<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Equipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Equipos', function (Blueprint $table) {
            $table->integer('Secuencial')->primary();
            $table->integer('SecuencialTipoEquipo');
            $table->foreign('SecuencialTipoEquipo')->references('Secuencial')->on('TipoEquipo')->onDelete('cascade');
            $table->string('CedulaResponsable', 10);
            $table->foreign('CedulaResponsable')->references('Cedula')->on('Responsable')->onDelete('cascade');
            $table->string('Nombre', 50);
            $table->string('Codigo', 50);
            $table->integer('MarcaEquipo');
            $table->foreign('MarcaEquipo')->references('Secuencial')->on('Marca')->onDelete('cascade');
            $table->string('Modelo', 50)->nullable();
            $table->string('Serie', 50)->nullable();
            $table->string('DireccionIP', 50);
            $table->string('DireccionMAC', 50);
            $table->string('Dominio', 50);
            $table->tinyInteger('PoseeConectividad');
            $table->string('Observacion', 100)->nullable();
            $table->integer('ProcesadorSecuencial');
            $table->foreign('ProcesadorSecuencial')->references('Secuencial')->on('Procesador')->onDelete('cascade');
            $table->tinyInteger('ConectividadImpresora')->nullable();
            $table->string('IPImpresora', 50)->nullable();
            $table->integer('MarcaImpresora')->nullable();
            $table->foreign('MarcaImpresora')->references('Secuencial')->on('Marca')->onDelete('cascade');
            $table->string('CapacidadMemoria', 50);
            $table->integer('MarcaDisco1');
            $table->foreign('MarcaDisco1')->references('Secuencial')->on('Marca')->onDelete('cascade');
            $table->string('CapacidadDisco1', 50);
            $table->integer('MarcaDisco2')->nullable();
            $table->foreign('MarcaDisco2')->references('Secuencial')->on('Marca')->onDelete('cascade');
            $table->string('CapacidadDisco2', 50)->nullable();
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
