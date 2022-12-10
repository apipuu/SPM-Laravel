<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Buku;


class SeederBuku extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
    	$faker = Faker::create('id_ID');
        $arrayValues = ['Fiksi Sastra', 'Non Fiksi', 'Misteri', 'Thriller', 'Horor', 'Fiksi Sejarah', 'Romantis','Fiksi Ilmiah','Fantasi','Keluarga', 'Sastra'];
    	for($i = 1; $i <= 2100; $i++){
    		Buku::create([
                'kode_buku' => 'BKP'.$i,
                'nama_buku'=> $faker->words(3, true),
                'jumlah_buku'=> $faker->numberBetween(1,10),
                'penulis' => $faker->name,
                'penerbit' => $faker->company(),
                'jenis_buku' => $arrayValues[rand(0, 10)],
                'status' => 'Tersedia'
    		]);
 
    	}
 
    }
}
