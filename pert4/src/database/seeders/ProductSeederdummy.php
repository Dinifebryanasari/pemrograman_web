<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Product::count() === 0) {
            Product::create([
                'name' => 'Sepatu',
                'description' => 'Adidas',
                'image' => '', // Bisa diisi path jika ada gambar default
            ]);
        }
    }
}
