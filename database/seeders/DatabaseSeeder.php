<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(CountrySeeder::class);
        // $this->call(UserSeeder::class);
        \App\Models\State::factory(30)->create();
        \App\Models\Country::factory(30)->create();
        \App\Models\City::factory(30)->create();
        
        \App\Models\Post::factory(30)->create();
        \App\Models\Category::factory(30)->create();
        \App\Models\Language::factory(5)->create();
    }
}
