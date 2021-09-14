<?php

namespace Database\Seeders\Adverts;

use App\Models\Adverts\Category;
use Illuminate\Database\Seeder;

class AdvertsCategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        Category::factory()->count(10)->create()->each(function(Category $category) {
            $counts = [0, random_int(3, 7)];
            $category->children()->saveMany(Category::factory()->count($counts[array_rand($counts)])->create()->each(function(Category $category) {
                $counts = [0, random_int(3, 7)];
                $category->children()->saveMany(Category::factory()->count($counts[array_rand($counts)])->create());
            }));
        });
    }
}
