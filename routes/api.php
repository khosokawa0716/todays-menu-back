<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestController;
Route::get('/test', [TestController::class, 'index']);

Route::get('/login', function () {
    return response()->json(['message' => 'Please log in.'], 401);
})->name('login');

use App\Http\Controllers\RecipeController;
Route::get('/recipes/search', [RecipeController::class, 'searchByIngredients']);
Route::get('/recipes', [RecipeController::class, 'index']); // レシピ一覧
Route::get('/recipes/{id}', [RecipeController::class, 'show']); // 特定のレシピを取得
Route::post('/recipes', [RecipeController::class, 'store']); // レシピ作成
Route::put('/recipes/{id}', [RecipeController::class, 'update']); // レシピ更新
Route::delete('/recipes/{id}', [RecipeController::class, 'destroy']); // レシピ削除

use App\Http\Controllers\FavoriteRecipeController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/favorites', [FavoriteRecipeController::class, 'index']); // お気に入り一覧
    Route::post('/favorites/{recipe}', [FavoriteRecipeController::class, 'store']); // お気に入り追加
    Route::delete('/favorites/{recipe}', [FavoriteRecipeController::class, 'destroy']); // お気に入り削除
});

use App\Http\Controllers\AuthController;
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

