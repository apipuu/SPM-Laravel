<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('NIK');
            $table->string('nama');
            $table->string('isi_laporan');
            $table->date('tanggal_dibuat', strtotime('tanggal_dibuat'));
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
