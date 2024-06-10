<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teamlist'; // Nama tabel
    protected $primaryKey = 'TeamID'; // Primary key dari tabel
    public $timestamps = false; // Jika tidak menggunakan timestamps
    protected $keyType = 'string';
    public $incrementing = false;


    // protected $fillable = ['TeamID', 'TeamName', 'TeamLogo'];
    // Tambahkan properti dan metode lain yang diperlukan


    protected $fillable = ['TeamID', 'TeamName', 'TeamNationality', 'TeamLogo'];

    public function matchesAsTeam1()
    {
        return $this->hasMany(MatchSchedule::class, 'Team1ID');
    }

    public function matchesAsTeam2()
    {
        return $this->hasMany(MatchSchedule::class, 'Team2ID');
    }

    public function players()
    {
        return $this->hasMany(Player::class, 'TeamID', 'TeamID');
    }

}
