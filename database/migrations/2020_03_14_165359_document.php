<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Document extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('nik');
            $table->string('education');
            $table->string('jumlah_hafalan');
            $table->string('ktp');
            $table->string('ijazah');
            $table->string('surdes');
            $table->string('suror');
            $table->string('bukti_hafalan');
            $table->string('skck');
            $table->string('sur_ket_hafalan');
            $table->string('syahadah');
            $table->string('cv');
            $table->string('foto');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
