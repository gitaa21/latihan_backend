<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        DB::table('brands')->insert([
            'name' => 'Stray Kids',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('brands')->insert([
            'name' => 'BTS',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('brands')->insert([
            'name' => 'Ateez',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('brands')->insert([
            'name' => 'Aespa',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('brands')->insert([
            'name' => 'Kiss of Life',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
