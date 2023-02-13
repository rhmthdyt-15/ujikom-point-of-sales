<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Administrator',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'role'    => 'admin',
        ]);

        User::create([
            'name'     => 'Kasir',
            'email'    => 'kasir@gmail.com',
            'password' => bcrypt('12345'),
            'role'    => 'kasir',
        ]);
    }
}
