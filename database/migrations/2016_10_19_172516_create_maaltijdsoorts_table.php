<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaaltijdsoortsTable extends Migration
{
    public function up()
    {
        Schema::create('maaltijdsoorts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('soort');
            $table->float('prijs');
            $table->string('beschikbaar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('maaltijdsoorts');
    }
}
