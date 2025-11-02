<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Team;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::with('team')->orderBy('surname')->get();
        return view('players.index', compact('players'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('players.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'team_id' => 'required|exists:teams,id',
        ]);

        Player::create($request->only(['name', 'surname', 'date_of_birth', 'team_id']));

        return redirect()->route('players.index')->with('success', 'Играчот е додаден.');
    }

    public function edit(Player $player)
    {
        $teams = Team::all();
        return view('players.edit', compact('player', 'teams'));
    }

    public function update(Request $request, Player $player)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'team_id' => 'required|exists:teams,id',
        ]);

        $player->update($request->only(['name', 'surname', 'date_of_birth', 'team_id']));

        return redirect()->route('players.index')->with('success', 'Играчот е ажуриран.');
    }

    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('players.index')->with('success', 'Играчот е избришан.');
    }
}
