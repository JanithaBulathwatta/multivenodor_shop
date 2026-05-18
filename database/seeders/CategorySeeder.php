<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'categori_name' => 'Electronics',
                'slug' => 'electronics',
            ],
            [
                'categori_name' => 'Clothing',
                'slug' => 'clothing',
            ],
            [
                'categori_name' => 'Shoes',
                'slug' => 'shoes',
            ],

        ]);
    }
}
