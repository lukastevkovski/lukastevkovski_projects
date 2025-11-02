<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('name')->get();
        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:teams,name',
            'year_of_foundation' => 'required|integer|min:1850|max:' . date('Y'),
        ]);

        Team::create($request->only(['name', 'year_of_foundation']));

        return redirect()->route('teams.index')->with('success', 'Тимот е додаден.');
    }

    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:teams,name,' . $team->id,
            'year_of_foundation' => 'required|integer|min:1850|max:' . date('Y'),
        ]);

        $team->update($request->only(['name', 'year_of_foundation']));

        return redirect()->route('teams.index')->with('success', 'Тимот е ажуриран.');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Тимот е избришан.');
    }
}
