<?php

// database/seeders/SurveyorsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surveyor;

class SurveyorsSeeder extends Seeder
{
    public function run()
    {
        $surveyors = [
            'CCIC',
            'SURVEYOR INDONESIA',
            'ANINDYA',
            'COTECNA',
            'CARSURIN',
            'IOL',
            'GEOSERVICE',
            'SUCOFINDO',
        ];

        foreach ($surveyors as $surveyor) {
            Surveyor::firstOrCreate(['name' => trim($surveyor)]);
        }
    }
}


