<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['general', 'entertainment', 'sports', 'movies', 'politics', 'cars'];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
