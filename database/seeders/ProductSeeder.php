<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'price' => 10.99,
            'id_category' => 1,
            'description' => 'Description for Product 1',
            'quantity' => 50
        ]);

        Product::create([
            'name' => 'Product 2',
            'price' => 15.99,
            'id_category' => 2,
            'description' => 'Description for Product 2',
            'quantity' => 40
        ]);

    }
}
