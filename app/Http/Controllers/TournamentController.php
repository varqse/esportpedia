<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\MatchSchedule;

class TournamentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'TourStartDate');

        $tournaments = Tour::when($search, function ($query, $search) {
                return $query->where('TourName', 'like', '%' . $search . '%');
            })
            ->orderBy($sort)
            ->paginate(10);

        return view('tournaments.index', compact('tournaments', 'search', 'sort'));
    }

    public function showMatches($tourID)
    {
        $matches = MatchSchedule::where('TourID', $tourID)->with(['team1', 'team2'])->get();
        
        return view('matches.index', compact('matches'));
    }


}
