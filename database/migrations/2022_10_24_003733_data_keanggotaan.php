<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataKeanggotaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('data_keanggotaan', function (Blueprint $table) {
            $table->id();
            $table->string('NIK', 16)->unique();
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('pekerjaan');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('jenis_kelamin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_keanggotaan');
    }
}
