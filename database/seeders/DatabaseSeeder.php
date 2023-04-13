<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Product::create([
            'name'=> 'mouse',
            'unit'=> 'kg',
            'unitPrice' => 500,
            'category'=> 'input'

        ]);
        Product:: create([
            'name'=> 'keyboard',
            'unit'=> 'kg',
            'unitPrice' => 2000,
            'category'=>'input'

        ]);
      
        Product::create([
            'name'=> 'microphone',
            'unit'=> 'kg',
            'unitPrice' => 1000,
            'category'=>'input',
        ]);
        Product::create([
            'name'=> 'speaker',
            'unit'=> 'kg',
            'unitPrice' => 800,
            'category'=>'output'
        ]);
        Product::create([
            'name'=> 'headphone',
            'unit'=> 'kg',
            'unitPrice' => 5000,
            'category'=>'output'
        ]);
        Product::create([
            'name'=> 'projector',
            'unit'=> 'kg',
            'unitPrice' => 2500,
            'category'=>'output'
        ]);
        Product::create([
            'name'=> 'scanner',
            'unit'=> 'kg',
            'unitPrice' => 2000,
            'category'=>'input'
        ]);
        Product::create([
            'name'=> 'gpu',
            'unit'=> 'kg',
            'unitPrice' => 20000,
            'category'=>'output'
        ]);
        Product::create([
            'name'=> 'printer',
            'unit'=> 'kg',
            'unitPrice' => 1500,
            'category'=>'output'
        ]);
        Product::create([
            'name'=> 'monitor',
            'unit'=> 'kg',
            'unitPrice' => 4500,
            'category'=>'output'
        ]);
    }
}