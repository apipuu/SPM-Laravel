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
 
    	$faker = Faker::create('id_ID');
    	for($i = 1; $i <= 11; $i++){
    		data_laporan::create([
                'NIK' => $faker->numberBetween(1000000000000000,9999999999999999),
                'nama'=> $faker->name,
                'isi_laporan'=> $faker->words(10, true),
                'tanggal_dibuat' => now()
    		]);
 
    	}
 
    }
}
