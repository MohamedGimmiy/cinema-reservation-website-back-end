<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {      //--------- 7 fields --------//
        // UserName -> PrimaryKey, FirstName, LastName, Password, Email, BirthDate, Type =( $admin=1, $customer=2)
        Schema::connection('mysql')->create('User', function (Blueprint $table) {
            $table->string('UserName')->nullable($value = false)->primary();
            $table->string('FirstName')->nullable($value = false);
            $table->string('LastName')->nullable($value = false);
            $table->string('Password')->nullable($value = false);
            $table->string('Email')->nullable($value = false);
            $table->date('BirthDate')->nullable($value = false);
            $table->unsignedInteger('Type')->nullable($value = false);

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
        Schema::dropIfExists('User');
    }
}
