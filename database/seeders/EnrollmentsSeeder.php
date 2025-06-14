<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrollmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Enrollment::create([
            'course_id' => 1,
            'user_id' => 2,
            'completed' => false
        ]);

        Enrollment::create([
            'course_id' => 2,
            'user_id' => 2,
            'completed' => true
        ]);
    }
}
