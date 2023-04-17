<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'spesialis', 'no_telepon', 'hari_praktik', 'awal_jam_praktik', 'akhir_jam_praktik'];
}
