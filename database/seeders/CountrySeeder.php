<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\State;
use App\Models\Language;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name'=>'India'
        ]);

        State::create([
            'country_id'=>'1',
            'name'=>'Uttar Pradesh',
        ]);

        Language::create([
            'name'=>'Hindi',
        ]
    );

    }
}
