<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class MatchSchedule extends Model
// {
//     protected $table = 'matchschedule'; // Sesuaikan dengan nama tabel yang sesuai

//     public function team1()
//     {
//         return $this->belongsTo(Team::class, 'Team1ID', 'TeamID');
//     }

//     public function team2()
//     {
//         return $this->belongsTo(Team::class, 'Team2ID', 'TeamID');
//     }
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchSchedule extends Model
{
    protected $table = 'matchschedule'; // Sesuaikan dengan nama tabel yang sesuai
    protected $primaryKey = 'MatchID';

    protected $keyType = 'string';
    public $incrementing = false;

    public function team1()
    {
        return $this->belongsTo(Team::class, 'Team1ID');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'Team2ID');
    }
}
