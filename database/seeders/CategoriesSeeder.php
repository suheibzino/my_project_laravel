<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Web Development',
            'description' => 'About Web Development'
        ]);

        Category::create([
            'name' => 'Data Science',
            'description' => 'About Data Science'
        ]);

        Category::create([
            'name' => 'Mobile App Development',
            'description' => 'Learn how to build Android and iOS apps using Flutter or native technologies.',
        ]);

        Category::create([
            'name' => 'Artificial Intelligence',
            'description' => 'Explore AI concepts, machine learning, and neural networks.',
        ]);

        Category::create([
            'name' => 'Cyber Security',
            'description' => 'Understand the basics of cyber security, ethical hacking, and protection methods.',
        ]);

        Category::create([
            'name' => 'Business & Marketing',
            'description' => 'Learn digital marketing, business models, and entrepreneurship skills.',
        ]);

        Category::create([
            'name' => 'Graphic Design',
            'description' => 'Master design tools like Photoshop, Illustrator, and Figma.',
        ]);

        Category::create([
            'name' => 'Cloud Computing',
            'description' => 'Courses on AWS, Azure, and cloud infrastructure services.',
        ]);
    }
}
