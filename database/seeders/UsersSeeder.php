<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = public_path('images/defaultImage.jpg');

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'image' => $image,
        ]);

        User::create([
            'name' => 'Suheib',
            'email' => 'suheib@gmail.com',
            'password' => Hash::make('password'),
            'image' => $image,
        ]);

        User::create([
            'name' => 'Khaled',
            'email' => 'Khaled@gmail.com',
            'password' => Hash::make('password'),
            'image' => $image,
        ]);

        User::create([
            'name' => 'Ahmed',
            'email' => 'Ahmed@gmail.com',
            'password' => Hash::make('password'),
            'image' => $image,
        ]);
    }
}
