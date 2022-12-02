<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


class CategorySeeder extends Seeder
{

    public function run()
    {
        for($i=1;$i<20;$i++) {
            Category::create([
            'name' => 'Book '.$i,
            ]);
        }
    }
}
