<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'message' => 'Hello, this is a test message.',
        ]);

        Contact::create([
            'name' => 'Jane Doe',
            'email' => 'jane@doe.com',
            'message' => 'Hello, this is another test message.',
        ]);
    }
}
