<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Seat extends Model
{
    // use HasFactory;
    protected $fillable = ['id', 'nomor_kursi'];
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
