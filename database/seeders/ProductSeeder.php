<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(\App\Models\Product::class, 20)->create(); // < Laravel Verssion 8
        \App\Models\Product::factory()->count(20)->create();
    }
}
