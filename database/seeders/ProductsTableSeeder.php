<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(100)->create();
        // $now = now();
        // DB::table('products')->insert([
        //     'name' => 'Gelang',
        //     'price' => 40,
        //     'stock' => 5,
        //     'created_at' => $now,
        //     'updated_at' => $now,
        // ]);

        // DB::table('products')->insert([
        //     'name' => 'Kalung',
        //     'price' => 200000,
        //     'stock' => 4,
        //     'created_at' => $now,
        //     'updated_at' => $now,
        // ]);
    }
}
