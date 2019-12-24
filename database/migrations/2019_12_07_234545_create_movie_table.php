<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('Movie', function (Blueprint $table) {
            // movieId , movieName, gere, image, description, length
            $table->bigIncrements('id');
            $table->string('MovieName');
            $table->string('image');
            $table->string('description');
            $table->string('Gere');
            $table->string('Length');

            $table->engine = 'InnoDB';

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Movie');
    }
}
