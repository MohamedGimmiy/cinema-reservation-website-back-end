<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieDateScreeningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('movie_screen', function (Blueprint $table) {
            $table->unsignedBigInteger('movie_id');
            $table->date('MovieShowDate');
            $table->unsignedInteger('screen_id');


            $table->engine = 'InnoDB';

        });

        Schema::connection('mysql')->table('movie_screen', function (Blueprint $table) {
            $table->foreign('movie_id')->references('id')->on('Movie');
            $table->foreign('screen_id')->references('id')->on('Screen');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MovieDateScreening');
    }
}
