<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class CityFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->city(),
            'country_id'=>\App\Models\Country::all()->random()->id,
            'state_id'=>\App\Models\State::all()->random()->id,
        ];
    }

    
}
