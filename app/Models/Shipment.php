<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'gar', 'type','mv', 'bg', 'sp', 'fv', 'fd', 'bf', 'rc', 'ss', 'arrival_date', 'departure_date', 'cargo', 'company_id', 'dt', 'tg', 'sv'
    ];

    // Accessor to calculate duration
    public function company()
    {
        if ($this->type === 'domestik') {
            return $this->belongsTo(DomesticCompany::class, 'company_id');
        } else {
            return $this->belongsTo(InternationalCompany::class, 'company_id');
        }
    }

    public function getDurationAttribute(){
        $arrivalDate = \Carbon\Carbon::parse($this->arrival_date);
        $depatureDate = \Carbon\Carbon::parse($this->departure_date);
        return  $depatureDate->diffInDays($arrivalDate); 
    }
}
