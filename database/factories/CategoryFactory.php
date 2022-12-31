<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class CategoryFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(1),
        ];
    }

    
}
