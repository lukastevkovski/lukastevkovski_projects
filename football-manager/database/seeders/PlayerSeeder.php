<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Player;
use App\Models\Team;
use Carbon\Carbon;

class PlayerSeeder extends Seeder
{
    public function run(): void
    {
        $teams = Team::all();

        $players = [
            ['name' => 'Marko', 'surname' => 'Petkov', 'date_of_birth' => '2005-03-12'],
            ['name' => 'Stefan', 'surname' => 'Ivanov', 'date_of_birth' => '2006-07-25'],
            ['name' => 'Luka', 'surname' => 'Stojanovski', 'date_of_birth' => '2004-11-02'],
            ['name' => 'Nikola', 'surname' => 'Trajkov', 'date_of_birth' => '2005-01-15'],
            ['name' => 'Aleksandar', 'surname' => 'Mitreski', 'date_of_birth' => '2003-09-20'],
        ];

        foreach ($players as $player) {
            $team = $teams->random();
            Player::create(array_merge($player, ['team_id' => $team->id]));
        }

        $this->command->info('✅ Players seeded successfully!');
    }
}
