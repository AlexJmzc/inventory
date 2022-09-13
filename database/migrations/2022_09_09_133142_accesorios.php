<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Accesorios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Accesorios', function (Blueprint $table) {
            $table->integer('Secuencial')->primary();
            $table->integer('SecuencialTipoAccesorio');
            $table->foreign('SecuencialTipoAccesorio')->references('Secuencial')->on('TipoAccesorio')->onDelete('cascade');
            $table->string('Codigo', 50);
            $table->integer('Marca')->nullable();
            $table->foreign('Marca')->references('Secuencial')->on('Marca')->onDelete('cascade');
            $table->string('Serie', 50)->nullable();
            $table->string('Modelo', 50)->nullable();
            $table->string('Descripcion', 100)->nullable();
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
