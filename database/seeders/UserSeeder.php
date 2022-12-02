<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


class UserSeeder extends Seeder
{

    public function run()
    {
        for($i=11;$i<20;$i++) {
            User::create([
            'name' => 'hamza '.$i,
            'email' =>  'hamza '.$i.'@gmail.com',
            'password' => '123456789'
            ]);
        }
    }
}
