<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'NIK' => null,
            'name' => 'Admin',
            'email' => 'admin@polban.ac.id',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');
    }
}
