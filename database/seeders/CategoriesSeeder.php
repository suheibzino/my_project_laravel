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
    }
}
