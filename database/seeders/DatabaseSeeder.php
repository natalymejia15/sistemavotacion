<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Resource;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory()->count(5)->create();
        foreach ($categories as $category) {
            Resource::factory()->count(5)->create([
                'category_id' => $category->id,
            ]);
        }
    }
}
