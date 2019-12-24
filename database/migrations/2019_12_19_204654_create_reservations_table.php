<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('reservations', function (Blueprint $table) {
            // reservationId, UserId
            $table->bigIncrements('id');
            $table->string('UserName');

            $table->engine = 'InnoDB';

        });

        Schema::connection('mysql')->table('reservations', function (Blueprint $table) {
            $table->foreign('UserName')->references('UserName')->on('User');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
