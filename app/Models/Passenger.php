<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;
class Passenger extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'jenis_identitas', 'no_identitas', 'nama', 'email', 'no_hp', 'alamat'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
