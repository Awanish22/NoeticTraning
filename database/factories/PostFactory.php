<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class PostFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->paragraph(1),
            'description'=>$this->faker->paragraph(1),
            'user_id'=>\App\Models\User::all()->random()->id,
        ];
    }

    
}
