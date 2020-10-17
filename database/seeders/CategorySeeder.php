<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(\App\Models\Category::class, 5)->create(); // < Laravel Verssion 8
        \App\Models\Category::factory()->count(5)->create();
    }
}
