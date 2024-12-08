<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        DB::table('categories')->insert([
            'name' => 'Dress',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('categories')->insert([
            'name' => 'Aksesoris',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('categories')->insert([
            'name' => 'Sepatu',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('categories')->insert([
            'name' => 'Rok',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('categories')->insert([
            'name' => 'Skincare',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
