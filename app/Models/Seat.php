<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Seat extends Model
{
    // use HasFactory;
    protected $fillable = ['nomor_kursi'];
    public function transaction()
{
    return $this->belongsTo(Transaction::class);
}
}
