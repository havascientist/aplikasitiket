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
    protected $fillable = ['penumpang_id', 'seat_id', 'tiket_id', 'total_harga'];

    public function tickets()
{
    return $this->belongsTo(Tiket::class);
}

public function passengers()
{
    return $this->hasMany(Passenger::class);
}

public function seats()
{
    return $this->hasMany(Seat::class);
}
}
