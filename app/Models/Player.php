<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'playerlist'; // Name of the table
    protected $primaryKey = 'PlayerID'; // Primary key of the table
    public $timestamps = false; // Disable timestamps
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'PlayerID', 'PlayerName', 'PlayerNationality', 'PlayerRole', 'PlayerDOB', 'TeamID', 'Nickname'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'TeamID');
    }
}
