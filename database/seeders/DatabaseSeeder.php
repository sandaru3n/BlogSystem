<?php

namespace Database\Seeders;

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
        $this->call(CategorySeeder::class);
        // Create sample posts
        \App\Models\Post::create([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'Sample Blog Post',
            'slug' => 'sample-blog-post',
            'excerpt' => 'This is a sample excerpt for the blog post.',
            'content' => 'This is the full content of the sample blog post.',
            'featured_image' => null,
            'published' => true,
        ]);
    }
}
