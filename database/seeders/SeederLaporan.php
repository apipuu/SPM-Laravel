<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\data_laporan;


class SeederLaporan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
    	data_laporan::create([
            'NIK' => 1234567890123456,
            'nama' => 'aseps',
            'isi_laporan' => 'Buku beberapa ada yang cacat',
            'tanggal_dibuat' => now(),
        ]);
 
    }
}
