<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ROA extends Model
{
    use HasFactory;

    protected $fillable = [
        'tm', 'im', 'ash', 'vm', 'VM2', 'fc', 'ts', 'Adb', 'Arb', 'Daf', 'Analisis_Standar', 'Coa_number'
    ];
}
