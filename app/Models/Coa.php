<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coa extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika nama tabel tidak mengikuti konvensi Laravel
    // protected $table = 'coas'; 

    // Tentukan atribut yang dapat diisi massal
    protected $fillable = [
        'tm',
        'im',
        'ash_adb',
        'ash_db',
        'vm',
        'fc',
        'ts_adb',
        'ts_db',
        'adb',
        'arb',
        'daf'
    ];

    // Jika menggunakan timestamp, pastikan untuk menonaktifkan jika tabel tidak memiliki kolom created_at dan updated_at
    // public $timestamps = false;
}
