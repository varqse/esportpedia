<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tourlist';
    protected $primaryKey = 'TourID'; // Atur primary key menjadi TourID
    protected $keyType = 'string';
    public $incrementing = false;
    
    // Pastikan bahwa kolom TourID selalu diisi dengan nilai yang valid
    protected $fillable = ['TourID', 'TourName', 'TourTier', 'TourStartDate', 'TourFinishDate', 'Location'];

    // Atur aturan validasi untuk TourID
    public static $rules = [
        'TourID' => 'required|unique:tourlist,TourID|regex:/^TO[0-9]{3}$/'
        // Ini akan memastikan bahwa TourID memiliki format TOxxx dan unik di tabel tourlist
    ];
}


