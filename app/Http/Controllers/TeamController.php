<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class TeamController extends Controller
{
    // Fungsi untuk user biasa
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    public function showPlayers($teamId)
    {
        $team = Team::findOrFail($teamId);
        $players = Player::where('TeamID', $teamId)->get();
        return view('teams.players', compact('team', 'players'));
    }

    // Fungsi untuk admin
    public function adminIndex()
    {
        $teams = Team::with('players')->get();
        return view('adminteam.index', compact('teams'));
    }

    public function create()
    {
        return view('adminteam.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'TeamName' => 'required|string|max:255|unique:teamlist,TeamName',
            'TeamNationality' => 'required|string|max:50',
            'TeamLogo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Mendapatkan nilai TeamID tertinggi
        $maxTeamID = DB::table('teamlist')->select(DB::raw("MAX(CAST(SUBSTRING(TeamID, 3) AS UNSIGNED)) AS max_id"))->where('TeamID', 'LIKE', 'TL%')->first()->max_id;
    
        // Menambah 1 ke nilai TeamID tertinggi untuk mendapatkan nilai TeamID berikutnya
        $nextTeamID = $maxTeamID + 1;
    
        // format TLXXX
        $newTeamID = 'TL' . str_pad($nextTeamID, 3, '0', STR_PAD_LEFT);
    
        // Membuat objek Team baru
        $team = new Team();
        $team->TeamID = $newTeamID;
        $team->TeamName = $request->TeamName;
        $team->TeamNationality = $request->TeamNationality;
    
        if ($request->hasFile('TeamLogo')) {
            $imagePath = $request->file('TeamLogo')->store('images', 'public');
            $team->TeamLogo = basename($imagePath);
        }
    
        $team->save();
    
        return redirect()->route('admin.teams')->with('success', 'Team created successfully.');
    }
    


    public function edit(Team $team)
    {
        return view('adminteam.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'TeamName' => 'required|string|max:255',
            'TeamLogo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $team->TeamName = $request->TeamName;

        if ($request->hasFile('TeamLogo')) {
            if ($team->TeamLogo && Storage::disk('public')->exists('team_logos/' . $team->TeamLogo)) {
                Storage::disk('public')->delete('team_logos/' . $team->TeamLogo);
            }

            $imagePath = $request->file('TeamLogo')->store('team_logos', 'public');
            $team->TeamLogo = basename($imagePath);
        }

        $team->save();

        return redirect()->route('admin.teams')->with('success', 'Team updated successfully.');
    }

    // public function createPlayer(Request $request, $teamId)
    // {


    //     // Validasi data yang diterima dari formulir
    //     $validatedData = $request->validate([
    //         'PlayerName' => 'required|string|max:255',
    //         'PlayerNationality' => 'required|string|max:255',
    //         'PlayerRole' => 'required|string|max:255',
    //         'PlayerDOB' => 'required|date',
    //         'Nickname' => 'nullable|string|max:255',
    //     ]);

    
    //     Player::insert([
    //         'PlayerName' => $validatedData['PlayerName'],
    //         'PlayerNationality' => $validatedData['PlayerNationality'],
    //         'PlayerRole' => $validatedData['PlayerRole'],
    //         'PlayerDOB' => $validatedData['PlayerDOB'],
    //         'Nickname' => $validatedData['Nickname'],
    //         'TeamID' => $teamId,
    //     ]);

    
    //     // Redirect ke halaman yang sesuai setelah berhasil menyimpan pemain
    //     return redirect()->route('adminteam.index')->with('success', 'Player created successfully.');
    // }
    
    public function createPlayer(Request $request, $teamId)
{
    // Validasi data yang diterima dari formulir
    $validatedData = $request->validate([
        'PlayerName' => 'required|string|max:255',
        'PlayerNationality' => 'required|string|max:255',
        'PlayerRole' => 'required|string|max:255',
        'PlayerDOB' => 'required|date',
        'Nickname' => 'nullable|string|max:255',
    ]);

    // Generate unique PlayerID
    $newPlayerID = $this->generateUniquePlayerID();

    // Simpan data pemain baru ke database menggunakan metode insert
    Player::insert([
        'PlayerID' => $newPlayerID,
        'PlayerName' => $validatedData['PlayerName'],
        'PlayerNationality' => $validatedData['PlayerNationality'],
        'PlayerRole' => $validatedData['PlayerRole'],
        'PlayerDOB' => $validatedData['PlayerDOB'],
        'Nickname' => $validatedData['Nickname'],
        'TeamID' => $teamId,
    ]);

    // Redirect ke halaman yang sesuai setelah berhasil menyimpan pemain
    return redirect()->route('adminteam.index')->with('success', 'Player created successfully.');
}

// Fungsi untuk menghasilkan PlayerID yang unik
private function generateUniquePlayerID() {
    $playerCount = Player::count();

    do {
        $nextPlayerID = $playerCount + 1;
        $newPlayerID = 'PL' . str_pad($nextPlayerID, 3, '0', STR_PAD_LEFT);

        // Periksa apakah PlayerID sudah ada dalam database
        $existingPlayer = Player::where('PlayerID', $newPlayerID)->first();
        
        // Jika PlayerID sudah ada, ulangi proses untuk menghasilkan ID yang unik
        if ($existingPlayer) {
            $playerCount++;
        }
    } while ($existingPlayer);

    return $newPlayerID;
}



    public function destroy(Team $team)
    {
        if ($team->TeamLogo && Storage::disk('public')->exists('team_logos/' . $team->TeamLogo)) {
            Storage::disk('public')->delete('team_logos/' . $team->TeamLogo);
        }

        $team->delete();

        return redirect()->route('admin.teams')->with('success', 'Team deleted successfully.');
    }



}


// class TeamController extends Controller
// {
//     public function index()
//     {
    
//         $teams = Team::all();
//         return view('teams.index', compact('teams'));
//     }

//     public function showPlayers($teamId)
//     {
//         $team = Team::findOrFail($teamId);
//         $players = Player::where('TeamID', $teamId)->get();
//         return view('teams.players', compact('team', 'players'));
//     }



//     public function adminIndex()
//     {
//         $teams = Team::all();
//         return view('adminteam.index', compact('teams'));
//     }

//     public function create()
//     {
//         return view('adminteam.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'TeamName' => 'required|string|max:255',
//             'TeamLogo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//         ]);

//         $team = new Team();
//         $team->TeamName = $request->TeamName;

//         if ($request->hasFile('TeamLogo')) {
//             $imagePath = $request->file('TeamLogo')->store('team_logos', 'public');
//             $team->TeamLogo = basename($imagePath);
//         }

//         $team->save();

//         return redirect()->route('admin.teams')->with('success', 'Team created successfully.');
//     }

//     public function edit(Team $team)
//     {
//         return view('adminteam.edit', compact('team'));
//     }

//     public function update(Request $request, Team $team)
//     {
//         $request->validate([
//             'TeamName' => 'required|string|max:255',
//             'TeamLogo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//         ]);

//         $team->TeamName = $request->TeamName;

//         if ($request->hasFile('TeamLogo')) {
//             if ($team->TeamLogo && Storage::disk('public')->exists('team_logos/' . $team->TeamLogo)) {
//                 Storage::disk('public')->delete('team_logos/' . $team->TeamLogo);
//             }

//             $imagePath = $request->file('TeamLogo')->store('team_logos', 'public');
//             $team->TeamLogo = basename($imagePath);
//         }

//         $team->save();

//         return redirect()->route('admin.teams')->with('success', 'Team updated successfully.');
//     }

//     public function destroy(Team $team)
//     {
//         if ($team->TeamLogo && Storage::disk('public')->exists('team_logos/' . $team->TeamLogo)) {
//             Storage::disk('public')->delete('team_logos/' . $team->TeamLogo);
//         }

//         $team->delete();

//         return redirect()->route('admin.teams')->with('success', 'Team deleted successfully.');
//     }
// }
