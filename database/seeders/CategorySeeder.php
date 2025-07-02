<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Technology', 'slug' => Str::slug('Technology')],
            ['name' => 'Lifestyle', 'slug' => Str::slug('Lifestyle')],
            ['name' => 'Travel', 'slug' => Str::slug('Travel')],
        ];
        DB::table('categories')->insert($categories);
    }
} 