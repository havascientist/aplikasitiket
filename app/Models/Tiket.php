<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class tiket extends Model
{
    // use HasFactory;
    protected $table = 'tikets';
    protected $fillable = ['asal', 'tujuan', 'kategori', 'tanggal', 'jam_berangkat', 'harga'];

    public function transactions()
{
    return $this->hasMany(Transaction::class);
}
}
