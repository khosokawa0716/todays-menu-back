<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeIngredientsTableSeeder extends Seeder
{
    public function run()
    {
        // レシピIDと材料IDを使って、関連付けを挿入
        DB::table('recipe_ingredients')->insert([
            [
                'recipe_id' => 1, // ハヤシライスのレシピ
                'ingredient_id' => 1, // 牛肉
                'quantity' => 200.00 // 200g
            ],
            [
                'recipe_id' => 1, // ハヤシライスのレシピ
                'ingredient_id' => 2, // 玉ねぎ
                'quantity' => 2.00 // 2個
            ],
            [
                'recipe_id' => 2, // カレーライスのレシピ
                'ingredient_id' => 3, // にんじん
                'quantity' => 1.00 // 1個
            ],
            [
                'recipe_id' => 2, // カレーライスのレシピ
                'ingredient_id' => 4, // ジャガイモ
                'quantity' => 2.00 // 2個
            ],
        ]);
    }
}

