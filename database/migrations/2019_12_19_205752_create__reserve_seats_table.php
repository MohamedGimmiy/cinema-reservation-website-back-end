<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReserveSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('Reserve_seats', function (Blueprint $table) {
            $table->unsignedBigInteger('reservation_id');
            $table->integer('col');
            $table->integer('row');

            $table->engine = 'InnoDB';

        });



        Schema::connection('mysql')->table('Reserve_seats', function (Blueprint $table) {
            $table->foreign('reservation_id')->references('id')->on('reservations');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ReserveSeats');
    }
}
