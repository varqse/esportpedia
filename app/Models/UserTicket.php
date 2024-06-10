<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTicket extends Model
{
    use HasFactory;

    protected $table = 'user_tickets';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'match_id',
        'quantity',
        'price',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model MatchSchedule (opsional, jika Anda ingin menambahkan relasi ini)
    public function match()
    {
        return $this->belongsTo(MatchSchedule::class, 'match_id', 'MatchID');
    }
}
