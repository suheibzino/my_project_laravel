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
        $lessons = [
            [
                'title' => 'Introduction',
                'description' => 'Getting started with the course.',
                'video_url' => 'https://www.youtube.com/watch?v=q-_ezD9Swz4&t=52s&pp=ygUQbGVhcm4gcHJvZ3JhbWluZw%3D%3D'
            ],
            [
                'title' => 'Core Concepts',
                'description' => 'Exploring core topics of the subject.',
                'video_url' => 'https://www.youtube.com/watch?v=zOjov-2OZ0E&pp=ygUQbGVhcm4gcHJvZ3JhbWluZw%3D%3D'
            ],
            [
                'title' => 'Project Demo',
                'description' => 'Final project walkthrough.',
                'video_url' => 'https://www.youtube.com/watch?v=CIRGjwYgdT4&pp=ygUQbGVhcm4gcHJvZ3JhbWluZ9IHCQnBCQGHKiGM7w%3D%3D'
            ]
        ];

        for ($courseId = 1; $courseId <= 24; $courseId++) {
            foreach ($lessons as $lesson) {
                Lesson::create([
                    'course_id' => $courseId,
                    'title' => $lesson['title'],
                    'description' => $lesson['description'],
                    'video_url' => $lesson['video_url'],
                ]);
            }
        }
    }
}
