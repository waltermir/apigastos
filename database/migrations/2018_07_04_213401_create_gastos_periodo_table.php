<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGastosPeriodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos_periodo', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('periodo')->references('id')->on('periodo');
            $table->foreign('gasto')->references('id')->on('gasto');
            $table->decimal('pagar',8,2);
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
        Schema::drop('gastos_periodo');
    }
}
