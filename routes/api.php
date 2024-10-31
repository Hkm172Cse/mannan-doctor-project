<?php

use App\Http\Controllers\API\admin\AdminController;
use App\Http\Controllers\API\ChannelController;
use App\Http\Controllers\API\IngredientsController;
use App\Http\Controllers\API\RecipieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/admin/login', [AdminController::class, 'login']);

Route::get('stripe/key',[AdminController::class,'getStripeKey']);




Route::group(['prefix' => 'admin', 'middleware'=>'auth:sanctum'], function(){
    Route::post('logout', [AdminController::class, 'logout']);
    Route::get('profile', [AdminController::class, 'Profile']);

    Route::get('recipe-list', [RecipieController::class, 'RecipieList']);
    Route::get('recipe-edit/{id}', [RecipieController::class, 'EditRecipie']);
    Route::post('recipe-update', [RecipieController::class, 'UpdateRecipie']);
    Route::post('recipe-insert', [RecipieController::class, 'InsertRecipie']);
    Route::get('recipe-search-by-ingredient', [RecipieController::class, 'RecipieSearchByIngredients']);

    //CHANNEL API
    Route::get('channel-list', [ChannelController::class, 'ChannelList']);
    Route::get('channel-edit/{id}', [ChannelController::class, 'EditChannel']);
    Route::post('channel-update', [ChannelController::class, 'UpdateChannel']);
    Route::post('channel-insert', [ChannelController::class, 'InsertChannel']);

    //INGREDIENTS API
    Route::get('ingredients-list', [IngredientsController::class, 'IngredientsList']);
    Route::get('ingredients-edit/{id}', [IngredientsController::class, 'EditIngredients']);
    Route::post('ingredients-update', [IngredientsController::class, 'UpdateIngredients']);
    Route::post('ingredients-insert', [IngredientsController::class, 'InsertIngredients']);



});

// Recipe API without token 
Route::get('recipe-list', [RecipieController::class, 'RecipieList']);
Route::get('recipe-edit/{id}', [RecipieController::class, 'EditRecipie']);
Route::post('recipe-update', [RecipieController::class, 'UpdateRecipie']);
Route::post('recipe-insert', [RecipieController::class, 'InsertRecipie']);
Route::get('recipe-search-by-ingredient', [RecipieController::class, 'RecipieSearchByIngredients']);

Route::get('recipe-search', [RecipieController::class, 'RecipieSearch']);

//CHANNEL API without token
Route::get('channel-list', [ChannelController::class, 'ChannelList']);
Route::get('channel-edit/{id}', [ChannelController::class, 'EditChannel']);
Route::post('channel-update', [ChannelController::class, 'UpdateChannel']);
Route::post('channel-insert', [ChannelController::class, 'InsertChannel']);

 //INGREDIENTS API without token
 Route::get('ingredients-list', [IngredientsController::class, 'IngredientsList']);
 Route::get('ingredients-edit/{id}', [IngredientsController::class, 'EditIngredients']);
 Route::post('ingredients-update', [IngredientsController::class, 'UpdateIngredients']);
 Route::post('ingredients-insert', [IngredientsController::class, 'InsertIngredients']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





