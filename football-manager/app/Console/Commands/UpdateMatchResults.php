<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MatchModel;

class UpdateMatchResults extends Command
{
    protected $signature = 'matches:update-results';
    protected $description = 'Update results for matches played in the last 24 hours';

    public function handle()
    {
        $matches = MatchModel::where('played', false)
            ->whereBetween('scheduled_at', [now()->subDay(), now()])
            ->get();

        foreach ($matches as $match) {
            $match->update([
                'score_home' => rand(0, 5),
                'score_away' => rand(0, 5),
                'played' => true,
            ]);
        }

        $this->info("Updated {$matches->count()} matches.");
    }
}
