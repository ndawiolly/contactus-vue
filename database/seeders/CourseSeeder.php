<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'title' => 'Laravel 12 Course',
            'description' => 'Learn Laravel 12 from scratch',
            'price' => 99.99,
            'duration' => '40 hours',
            'image' => 'https://example.com/laravel-12-course.jpg',
        ]);

        Course::create([
            'title' => 'Vue 3 Course',
            'description' => 'Learn Vue 3 from scratch',
            'price' => 89.99,
            'duration' => '30 hours',
            'image' => 'https://example.com/vue-3-course.jpg',
        ]);

        Course::create([
            'title' => 'PHP 8 Course',
            'description' => 'Learn PHP 8 from scratch',
            'price' => 79.99,
            'duration' => '20 hours',
            'image' => 'https://example.com/php-8-course.jpg',
        ]);
    }
}
