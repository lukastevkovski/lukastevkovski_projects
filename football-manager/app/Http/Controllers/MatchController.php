<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatchModel;
use App\Models\Team;

class MatchController extends Controller
{
    public function index()
    {
        $matches = MatchModel::with(['homeTeam', 'awayTeam'])->orderBy('match_date', 'desc')->get();
        return view('matches.index', compact('matches'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('matches.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'home_team_id' => 'required|different:away_team_id|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id',
            'match_date' => 'required|date',
        ]);

        MatchModel::create([
            'home_team_id' => $request->home_team_id,
            'away_team_id' => $request->away_team_id,
            'match_date' => $request->match_date,
            'home_score' => null,
            'away_score' => null,
        ]);

        return redirect()->route('matches.index')->with('success', 'Натпреварот е додаден.');
    }

    public function edit(MatchModel $match)
    {
        $teams = Team::all();
        return view('matches.edit', compact('match', 'teams'));
    }

    public function update(Request $request, MatchModel $match)
    {
        $request->validate([
            'home_team_id' => 'required|different:away_team_id|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id',
            'match_date' => 'required|date',
            'home_score' => 'nullable|integer|min:0',
            'away_score' => 'nullable|integer|min:0',
        ]);

        $match->update($request->only([
            'home_team_id', 'away_team_id', 'match_date', 'home_score', 'away_score'
        ]));

        return redirect()->route('matches.index')->with('success', 'Натпреварот е ажуриран.');
    }

    public function destroy(MatchModel $match)
    {
        $match->delete();
        return redirect()->route('matches.index')->with('success', 'Натпреварот е избришан.');
    }
}
