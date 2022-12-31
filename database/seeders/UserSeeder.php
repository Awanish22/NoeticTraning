<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Contact;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'max',
            'email'=>"max@gmail.com",
            'password'=>"123456"
        ]);

        Contact::create([
            'user_id'=>'1',
            'phone_no'=>'998877444',
            'address'=>'Gorakhpur'
        ]);
    }
}
