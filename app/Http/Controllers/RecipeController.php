<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    // レシピの一覧を取得
    public function index()
    {
        $recipes = Recipe::all(); // すべてのレシピを取得
        return response()->json($recipes);
    }

    // レシピを取得（ID指定）
    public function show($id)
    {
        $recipe = Recipe::find($id); // 指定されたIDのレシピを取得
        if (!$recipe) {
            return response()->json(['message' => 'show Recipe not found'], 404);
        }
        return response()->json($recipe);
    }

    // 新しいレシピの作成
    public function store(Request $request)
    {
        $recipe = Recipe::create($request->all());
        return response()->json($recipe, 201);
    }

    // レシピの更新
    public function update(Request $request, $id)
    {
        $recipe = Recipe::find($id);
        if (!$recipe) {
            return response()->json(['message' => 'update Recipe not found'], 404);
        }
        $recipe->update($request->all());
        return response()->json($recipe);
    }

    // レシピの削除
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        if (!$recipe) {
            return response()->json(['message' => 'delete Recipe not found'], 404);
        }
        $recipe->delete();
        return response()->json(['message' => 'Recipe deleted successfully']);
    }

    public function searchByIngredients(Request $request)
    {
        // クエリパラメータで材料名を受け取る
        $ingredientNames = $request->query('ingredients', []);

        // 文字列かどうかチェックし、配列でない場合は配列に変換する
        if (!is_array($ingredientNames)) {
            $ingredientNames = explode(',', $ingredientNames); // カンマで区切って配列に変換
        }
    
        if (empty($ingredientNames)) {
            return response()->json(['message' => '材料名を指定してください'], 400);
        }
    
        // 材料名に一致するレシピを取得
        $recipes = Recipe::whereHas('ingredients', function ($query) use ($ingredientNames) {
            $query->whereIn('name', $ingredientNames);
        })->get();
    
        if ($recipes->isEmpty()) {
            return response()->json(['message' => '該当するレシピが見つかりませんでした'], 404);
        }
    
        return response()->json($recipes);
    }
}

