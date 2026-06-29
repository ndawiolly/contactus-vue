<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Contact;
use Database\Seeders\CourseSeeder;
use Database\Seeders\ContactSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => 'password',
        ]);

        // Create courses
        // Course::create([
        //     'title' => 'Course 1',
        //     'description' => 'Description 1',
        //     'price' => 10,
        // ]);

        // Course::create([
        //     'title' => 'Course 2',
        //     'description' => 'Description 2',
        //     'price' => 20,
        // ]);

        $this->call([
            CourseSeeder::class,
        ]);

        // Create contacts
        $this->call([
            ContactSeeder::class,
        ]);
    }
}   
