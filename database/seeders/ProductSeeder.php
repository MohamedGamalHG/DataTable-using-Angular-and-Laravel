<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run()
    {

        for($i=1;$i<20;$i++) {
            Product::create([
            'title' => 'Book '.$i,
             'price'=> rand(2000,10000),
                'details'=>'this detail '.$i.'from seciton',
                'category_id'=>$i
            ]);
        }
    }
}
