<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReserveAmovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('movie_reservation', function (Blueprint $table) {
            $table->unsignedBigInteger('reservation_id');
            $table->unsignedBigInteger('movie_id');
            $table->date('MovieDate');

            $table->engine = 'InnoDB';

        });

        Schema::connection('mysql')->table('movie_reservation', function (Blueprint $table) {
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('movie_id')->references('id')->on('Movie')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserveAmovie');
    }
}
