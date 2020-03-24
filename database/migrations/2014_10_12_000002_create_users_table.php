<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('nik')->unique();
            $table->string('gender');
            $table->string('email')->unique()->nullable();
            $table->unsignedBigInteger('roles_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->unique();
            $table->integer('age');
            $table->string('birth_place')->nullable();
            $table->date('birth_day');
            $table->text('address');
            $table->string('birth_mother');
            $table->string('district');
            $table->string('ktp_address');

            $table->rememberToken();
            $table->timestamps();
            $table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
