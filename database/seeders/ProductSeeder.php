<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_id' => '1',
            'name' => 'Vivo',
            'description' => 'Dengan camera 1000MP',
            'category_id' => 'SMARTPHONE'
        ]);
        Product::create([
            'product_id' => '2',
            'name' => 'Xiaomi',
            'description' => 'Manteps canggih',
            'category_id' => 'SMARTPHONE'
        ]);
    }
}
