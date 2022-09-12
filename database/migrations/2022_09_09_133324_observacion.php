<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Observacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Observacion', function (Blueprint $table) {
            $table->integer('Secuencial')->primary();
            $table->string('Descripcion', 100);
            $table->integer('AccesoriosSecuencial');
            $table->foreign('AccesoriosSecuencial')->references('Secuencial')->on('Accesorios')->onDelete('cascade');
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
