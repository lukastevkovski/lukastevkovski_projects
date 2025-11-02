<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MatchModel;
use Carbon\Carbon;

class AddRandomMatchResults extends Command
{
    protected $signature = 'matches:add-random-results';
    protected $description = 'Додава случајни резултати на натпревари кои се одиграни во последните 24 часа';

    public function handle()
    {
        $yesterday = Carbon::now()->subDay();

        $matches = MatchModel::where('match_date', '<=', Carbon::now())
                             ->where('match_date', '>=', $yesterday)
                             ->whereNull('home_score')
                             ->whereNull('away_score')
                             ->get();

        foreach ($matches as $match) {
            $match->home_score = rand(0,5);
            $match->away_score = rand(0,5);
            $match->save();
            $this->info("Натпревар {$match->homeTeam->name} vs {$match->awayTeam->name} е ажуриран: {$match->home_score} : {$match->away_score}");
        }

        $this->info('✅ Сите натпревари се ажурирани.');
    }
}
