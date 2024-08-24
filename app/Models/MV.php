<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MV extends Model
{
    use HasFactory;

    protected $fillable = [
        'lot', 'barge', 'cargo', 'qty_mt', 'arrival_date', 'departure_date', 
        'jetty', 'tm', 'im', 'ash_adb', 'ash_db', 'vm', 
        'fc', 'ts', 'adb', 'arb', 'daf'
    ];
    
    protected $dates = [
       'arrival_date', 'departure_date', 
    ];
}

