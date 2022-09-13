<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TipoPeriferico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TipoAccesorio', function (Blueprint $table) {
            $table->integer('Secuencial')->primary();
            $table->string('Nombre', 50);
            $table->tinyInteger('EntradaSalida');
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
