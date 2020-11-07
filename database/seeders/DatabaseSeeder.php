<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(ProductsTableSeeder::class);
        // $this->call(ProductImageSeeder::class);
        // $this->call(VariationSeeder::class);
        \App\Models\Product::factory()->count(5)->create();
        \App\Models\ProductImage::factory()->count(10)->create();
        //\App\Models\Variation::factory()->create();
    }
}
