<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Product::create([
            'name' => 'pen',
        ]);

        \App\Models\Purchase::create([
            'product_id' => '1',
            'price' => 20.00,
            'quantity' => 1000,
            'purchase_date' => Carbon::today(),
        ]);

        \App\Models\Sale::create([
            'product_id' => '1',
            'price' => 25.00,
            'quantity' => 100,
            'sale_date' => Carbon::today(),
        ]);

        \App\Models\Adjustment::create([
            'product_id' => 1,
            'price' => 20.00,
            'quantity' => 10,
            'adjustment_date' => Carbon::today(),
        ]);
    }
}
