<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tiket;
use App\Models\Passenger;
use App\Models\Seat;

class Transaction extends Model
{
    // use HasFactory;,
    protected $fillable = ['id', 'users_id', 'passengers_id', 'seats_id', 'tiket_id', 'total_harga'];

    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'tiket_id');
    }

//     public function tickets()
// {
//     return $this->belongsTo(Tiket::class);
// }

public function passenger()
    {
        return $this->belongsTo(Passenger::class, 'passengers_id');
    }

// public function passengers()
// {
//     return $this->hasMany(Passenger::class);
// }

public function seat()
{
    return $this->belongsTo(Seat::class, 'seats_id');
}
// public function seats()
// {
//     return $this->hasMany(Seat::class);
// }
}
