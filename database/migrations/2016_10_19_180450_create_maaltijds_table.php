<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaaltijdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maaltijds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reservering')->unsigned();
            $table->foreign('reservering')->references('id')->on('reserverings');
            $table->integer('soort')->unsigned();
            $table->foreign('soort')->references('id')->on('maaltijdsoorts');
            $table->string('barcode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('maaltijds');
    }
}
