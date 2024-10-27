<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class FavoriteRecipeController extends Controller
{
    // お気に入りのレシピ一覧を取得
    public function index(Request $request)
    {
        $user = $request->user();
        $favorites = $user->favoriteRecipes()->get(); // ユーザーのお気に入りレシピを取得
        return response()->json($favorites);
    }

    // お気に入りに追加
    public function store(Request $request, Recipe $recipe)
    {
        $user = $request->user();
        $user->favoriteRecipes()->attach($recipe->id); // レシピをお気に入りに追加
        return response()->json(['message' => 'Recipe added to favorites']);
    }

    // お気に入りから削除
    public function destroy(Request $request, Recipe $recipe)
    {
        $user = $request->user();
        $user->favoriteRecipes()->detach($recipe->id); // レシピをお気に入りから削除
        return response()->json(['message' => 'Recipe removed from favorites']);
    }
}
