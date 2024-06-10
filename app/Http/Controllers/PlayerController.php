<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index($teamId)
    {
        $team = Team::findOrFail($teamId);
        $players = Player::where('TeamID', $teamId)->get();
        return view('players.index', compact('team', 'players'));
    }

    public function edit($playerId)
    {
        $player = Player::findOrFail($playerId);
        return view('adminteam.players.edit', compact('player'));
    }

    public function update(Request $request, $playerId)
    {
        $player = Player::findOrFail($playerId);
        $player->update($request->all());
        return redirect()->route('team.players', $player->TeamID);
    }

    public function destroy($playerId)
    {
        $player = Player::findOrFail($playerId);
        $teamId = $player->TeamID;
        $player->delete();
        return redirect()->route('team.players', $teamId);
    }




    public function create(Team $team)
    {
        return view('adminteam.players.create', compact('team'));
    }

    public function store(Request $request, Team $team)
    {
        $request->validate([
            'PlayerName' => 'required|string|max:255',
            'PlayerNumber' => 'required|integer|min:1|max:99',
            'PlayerPosition' => 'required|string|max:255',
        ]);

        $player = new Player();
        $player->TeamID = $team->TeamID;
        $player->PlayerName = $request->PlayerName;
        $player->PlayerNumber = $request->PlayerNumber;
        $player->PlayerPosition = $request->PlayerPosition;

        $player->save();

        return redirect()->route('admin.teams')->with('success', 'Player added successfully.');
    }

    // public function edit(Player $player)
    // {
    //     return view('adminteam.players.edit', compact('player'));
    // }

    // public function update(Request $request, Player $player)
    // {
    //     $request->validate([
    //         'PlayerName' => 'required|string|max:255',
    //         'PlayerNumber' => 'required|integer|min:1|max:99',
    //         'PlayerPosition' => 'required|string|max:255',
    //     ]);

    //     $player->PlayerName = $request->PlayerName;
    //     $player->PlayerNumber = $request->PlayerNumber;
    //     $player->PlayerPosition = $request->PlayerPosition;

    //     $player->save();

    //     return redirect()->route('admin.teams')->with('success', 'Player updated successfully.');
    // }

    // public function destroy(Player $player)
    // {
    //     $player->delete();

    //     return redirect()->route('admin.teams')->with('success', 'Player deleted successfully.');
    // }
}
