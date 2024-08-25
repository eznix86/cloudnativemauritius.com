<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Category;
use App\Models\Event;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Post::factory(10)
            ->has(Author::factory())
            ->has(Category::factory())
            ->create([
                'is_published' => true,
            ]);

        Event::factory(10)
            ->create();

        // Seed two future events
        Event::factory(2)->create([
            'start_date' => now()->addDays(30),
        ]);

        Page::factory(10)
            ->create();
    }
}
