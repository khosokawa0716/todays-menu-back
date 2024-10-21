<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recipes')->insert([
            [
                'name' => 'ハヤシライス',
                'description' => '簡単なハヤシライスのレシピです。',
                'cooking_time' => 30, // 分単位
                'difficulty' => '簡単',
                'budget' => '中予算',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'カレーライス',
                'description' => '定番のカレーライスのレシピ。',
                'cooking_time' => 45,
                'difficulty' => '中級',
                'budget' => '低予算',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
