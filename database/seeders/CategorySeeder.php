<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create(['name' => 'Category 1']);
        Category::create(['name' => 'Category 2']);
        Category::create(['name' => 'Category 3']);
    }
}
