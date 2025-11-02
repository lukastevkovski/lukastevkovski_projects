<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $teams = [
            ['name' => 'Galacticos', 'year_of_foundation' => 2010],
            ['name' => 'Raiders', 'year_of_foundation' => 2015],
            ['name' => 'Smilkovci', 'year_of_foundation' => 2012],
            ['name' => 'Prevalec', 'year_of_foundation' => 2008],
        ];

        foreach ($teams as $team) {
            Team::create($team);
        }

        $this->command->info('✅ Teams seeded successfully!');
    }
}
