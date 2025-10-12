<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'title' => 'Portfolio Website',
                'description' => 'A modern personal portfolio built with Laravel and Vue.js.',
                'image' => 'portfolio.png',
                'link' => 'https://example.com/portfolio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'E-commerce Platform',
                'description' => 'An online store with payment integration and admin dashboard.',
                'image' => 'shop.png',
                'link' => 'https://example.com/shop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
