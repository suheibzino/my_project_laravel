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
        $webDevImg = 'course_images/Web Development.jpg';
        $datasience = 'course_images/Data Science.jpg';
        $mobileDev = 'course_images/Mobile App Development.jpg';
        $ai = 'course_images/Artificial Intelligence.jpg';
        $cyperSc = 'course_images/Cyber Security.jpg';
        $busnessAndMarket = 'course_images/Business & Marketing.jpg';
        $graphicDesign = 'course_images/Graphic Design.jpg';
        $cloud = 'course_images/Cloud Computing.jpg';

        Course::create([
            'title' => 'Laravel for Beginners',
            'description' => 'Build powerful web apps using Laravel framework.',
            'image' => $webDevImg,
            'teacher' => 'Mohammed',
            'hours' => 10,
            'category_id' => 1,
        ]);

        Course::create([
            'title' => 'HTML, CSS, and JavaScript',
            'description' => 'Frontend web development fundamentals.',
            'image' => $webDevImg,
            'teacher' => 'Sara',
            'hours' => 8,
            'category_id' => 1,
        ]);

        Course::create([
            'title' => 'React JS',
            'description' => 'Learn how to build modern web interfaces using React.',
            'image' => $webDevImg,
            'teacher' => 'Yousef',
            'hours' => 12,
            'category_id' => 1,
        ]);

        Course::create([
            'title' => 'Python for Data Analysis',
            'description' => 'Pandas, NumPy, and data wrangling.',
            'image' => $datasience,
            'teacher' => 'Aya',
            'hours' => 9,
            'category_id' => 2,
        ]);

        Course::create([
            'title' => 'Data Visualization with Tableau',
            'description' => 'Turn data into beautiful visuals and dashboards.',
            'image' => $datasience,
            'teacher' => 'Rami',
            'hours' => 7,
            'category_id' => 2,
        ]);

        Course::create([
            'title' => 'Statistics for Data Science',
            'description' => 'Core statistical concepts used in DS.',
            'image' => $datasience,
            'teacher' => 'Salma',
            'hours' => 6,
            'category_id' => 2,
        ]);

        Course::create([
            'title' => 'Flutter from Scratch',
            'description' => 'Cross-platform mobile development using Flutter.',
            'image' => $mobileDev,
            'teacher' => 'Rania',
            'hours' => 15,
            'category_id' => 3,
        ]);

        Course::create([
            'title' => 'Android Development with Kotlin',
            'description' => 'Native Android apps using Kotlin.',
            'image' => $mobileDev,
            'teacher' => 'Omar',
            'hours' => 12,
            'category_id' => 3,
        ]);

        Course::create([
            'title' => 'iOS with SwiftUI',
            'description' => 'Build native iOS apps using SwiftUI.',
            'image' => $mobileDev,
            'teacher' => 'Leen',
            'hours' => 13,
            'category_id' => 3,
        ]);

        Course::create([
            'title' => 'Machine Learning Basics',
            'description' => 'Supervised and unsupervised learning.',
            'image' => $ai,
            'teacher' => 'Hala',
            'hours' => 14,
            'category_id' => 4,
        ]);

        Course::create([
            'title' => 'Deep Learning with TensorFlow',
            'description' => 'Neural networks and image recognition.',
            'image' => $ai,
            'teacher' => 'Basil',
            'hours' => 16,
            'category_id' => 4,
        ]);

        Course::create([
            'title' => 'AI in Business',
            'description' => 'Use cases of AI in real-world industries.',
            'image' => $ai,
            'teacher' => 'Amal',
            'hours' => 10,
            'category_id' => 4,
        ]);

        Course::create([
            'title' => 'Introduction to Cyber Security',
            'description' => 'Understand basic cyber threats and protection.',
            'image' => $cyperSc,
            'teacher' => 'Omar',
            'hours' => 8,
            'category_id' => 5,
        ]);

        Course::create([
            'title' => 'Ethical Hacking Fundamentals',
            'description' => 'Explore ethical hacking and Kali Linux.',
            'image' => $cyperSc,
            'teacher' => 'Jamal',
            'hours' => 9,
            'category_id' => 5,
        ]);

        Course::create([
            'title' => 'Network Security',
            'description' => 'Protecting networks and encryption basics.',
            'image' => $cyperSc,
            'teacher' => 'Sami',
            'hours' => 11,
            'category_id' => 5,
        ]);

        Course::create([
            'title' => 'Digital Marketing 101',
            'description' => 'SEO, Ads, and content strategies.',
            'image' => $busnessAndMarket,
            'teacher' => 'Nour',
            'hours' => 10,
            'category_id' => 6,
        ]);

        Course::create([
            'title' => 'E-commerce Strategies',
            'description' => 'Running successful online stores.',
            'image' => $busnessAndMarket,
            'teacher' => 'Khaled',
            'hours' => 7,
            'category_id' => 6,
        ]);

        Course::create([
            'title' => 'Social Media Campaigns',
            'description' => 'Marketing via Facebook, Instagram, and TikTok.',
            'image' => $busnessAndMarket,
            'teacher' => 'Lana',
            'hours' => 9,
            'category_id' => 6,
        ]);

        Course::create([
            'title' => 'Adobe Photoshop Basics',
            'description' => 'Photo editing and design fundamentals.',
            'image' => $graphicDesign,
            'teacher' => 'Layla',
            'hours' => 8,
            'category_id' => 7,
        ]);

        Course::create([
            'title' => 'Illustrator for Beginners',
            'description' => 'Logo design and vector illustrations.',
            'image' => $graphicDesign,
            'teacher' => 'Majed',
            'hours' => 10,
            'category_id' => 7,
        ]);

        Course::create([
            'title' => 'Figma UI/UX Design',
            'description' => 'Modern design workflows using Figma.',
            'image' => $graphicDesign,
            'teacher' => 'Alaa',
            'hours' => 9,
            'category_id' => 7,
        ]);

        Course::create([
            'title' => 'AWS for Beginners',
            'description' => 'Compute, storage, and networking with AWS.',
            'image' => $cloud,
            'teacher' => 'Samir',
            'hours' => 10,
            'category_id' => 8,
        ]);

        Course::create([
            'title' => 'Microsoft Azure Basics',
            'description' => 'Cloud infrastructure with Microsoft Azure.',
            'image' => $cloud,
            'teacher' => 'Dina',
            'hours' => 9,
            'category_id' => 8,
        ]);

        Course::create([
            'title' => 'Deploying Apps on Cloud',
            'description' => 'CI/CD, Docker, and deployment pipelines.',
            'image' => $cloud,
            'teacher' => 'Yazan',
            'hours' => 12,
            'category_id' => 8,
        ]);
    }
}
