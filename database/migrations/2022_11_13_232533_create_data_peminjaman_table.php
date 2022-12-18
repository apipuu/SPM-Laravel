<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('NIK');
            $table->string('kode_buku');
            $table->string('nama_buku');
            $table->date('tanggal_dipinjam', strtotime('tanggal_dipinjam'));
            $table->date('tanggal_dikembalikan', strtotime('tanggal_dikembalikan'));
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_peminjaman');
    }
}
