<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = public_path('images/defaultImage.jpg');
        Course::create([
            'title' => 'Laravel',
            'description' => 'Learn Laravel',
            'image' => $image,
            'teacher' => 'Mohammed',
            'hours' => 10,
            'category_id' => 1
        ]);

        Course::create([
            'title' => 'Java',
            'description' => 'About Java Language',
            'image' => $image,
            'teacher' => 'Ahmed',
            'hours' => 12,
            'category_id' => 2
        ]);
    }
}
