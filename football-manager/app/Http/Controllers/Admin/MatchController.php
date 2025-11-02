<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MatchModel;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $matches = MatchModel::all();
        return view('admin.matches.index', compact('matches'));
    }

    public function create()
    {
        return view('admin.matches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id',
            'match_date' => 'required|date',
        ]);

        MatchModel::create($request->all());

        return redirect()->route('admin.matches.index');
    }

    public function edit(MatchModel $match)
    {
        return view('admin.matches.edit', compact('match'));
    }

    public function update(Request $request, MatchModel $match)
    {
        $match->update($request->all());
        return redirect()->route('admin.matches.index');
    }

    public function destroy(MatchModel $match)
    {
        $match->delete();
        return redirect()->route('admin.matches.index');
    }
}
