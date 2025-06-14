<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Lesson::create([
            'course_id' => 1,
            'title' => 'Introduction to Laravel',
            'description' => 'Setup and basics',
            'video_url' => 'https://www.youtube.com/watch?v=1NDh-AWNwcM&authuser=0'
        ]);

        Lesson::create([
            'course_id' => 2,
            'title' => 'Introduction to Java',
            'description' => 'Java Language Basics',
            'video_url' => 'https://www.youtube.com/watch?v=04HIk1d-Pxw&list=PLCi9_wQUeSMU9lnFeub4Vb27S5TnwesCy&index=3&pp=iAQB'
        ]);
    }
}
