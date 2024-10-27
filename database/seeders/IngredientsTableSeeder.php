<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredients')->insert([
            [
                'name' => '牛肉',
                'category' => '肉',
                'unit' => 'g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '玉ねぎ',
                'category' => '野菜',
                'unit' => '個',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'にんじん',
                'category' => '野菜',
                'unit' => '個',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ジャガイモ',
                'category' => '野菜',
                'unit' => '個',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
