<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;

class Recipe extends Model
{
    use HasFactory;

    // 使用するテーブル名を指定（テーブル名が "recipes" であれば省略可能）
    protected $table = 'recipes';

    // 書き込み可能なカラムを指定
    protected $fillable = [
        'name',
        'description',
        'cooking_time',
        'difficulty',
        'budget',
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredients');
    }
    
    // ユーザーのお気に入りリレーション
    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorite_recipes');
    }
}

