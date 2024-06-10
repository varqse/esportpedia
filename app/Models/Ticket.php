<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket'; // Nama tabel dalam basis data
    protected $primaryKey = 'ticketid';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name', // Attribut yang dapat diisi secara massal
        'price',
        // tambahkan atribut lainnya sesuai kebutuhan
    ];

    // Jika Anda memiliki hubungan dengan model User, Anda bisa mendefinisikannya di sini
    // Misalnya, jika satu tiket dimiliki oleh satu pengguna
    public function user()
    {
        return $this->belongsTo(User::class); // asumsikan bahwa ada relasi belongsTo antara Ticket dan User
    }

    // Metode atau fungsi lainnya yang mungkin Anda perlukan di sini
}
