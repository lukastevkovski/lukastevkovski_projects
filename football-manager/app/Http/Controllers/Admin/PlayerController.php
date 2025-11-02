<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('admin.players.index', compact('players'));
    }

    public function create()
    {
        return view('admin.players.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'team_id' => 'required|exists:teams,id',
        ]);

        Player::create($request->all());

        return redirect()->route('admin.players.index');
    }

    public function edit(Player $player)
    {
        return view('admin.players.edit', compact('player'));
    }

    public function update(Request $request, Player $player)
    {
        $player->update($request->all());
        return redirect()->route('admin.players.index');
    }

    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('admin.players.index');
    }
}
