<?php

namespace Database\Seeders;

use \App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['product_name' => 'Laundry Reguler (Kg)', 'price' => 7.000],
            ['product_name' => 'Laundry Express (Kg)', 'price' => 10.000],
            ['product_name' => 'Cuci (Kg)', 'price' => 5.000],
            ['product_name' => 'Setrika (Kg)', 'price' => 5.000],
            ['product_name' => 'Bed Cover (pcs)', 'price' => 20.000],
            ['product_name' => 'Cuci Sepatu (pasang)', 'price' => 20.000],
            ['product_name' => 'Cuci Karpet (m²)', 'price' => 20.000],
            ['product_name' => 'Cuci Gorden (m²)', 'price' => 20.000]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
