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
         \App\Models\User::factory(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Product::create([
            'name'=> 'mouse',
            'unit'=> 'I have been to microsoft headquarters and ordered this magnificent mouse from the friendly clerks over there',
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
    }
}