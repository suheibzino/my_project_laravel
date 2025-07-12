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
        $image = ('images/suheibcv.jpeg');

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);

        User::create([
            'name' => 'Suheib',
            'email' => 'suheib@gmail.com',
            'password' => Hash::make('123456789'),
            'image' => $image,
        ]);

        User::create([
            'name' => 'Khaled',
            'email' => 'Khaled@gmail.com',
            'password' => Hash::make('123456789'),
            'image' => $image,
        ]);

        User::create([
            'name' => 'Ahmed',
            'email' => 'Ahmed@gmail.com',
            'password' => Hash::make('123456789'),
            'image' => $image,
        ]);
    }
}
