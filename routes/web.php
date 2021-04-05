<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    $recipes = \App\Models\Recipe::latest('created_at')->limit(3)->get();

    return view('index', ['recipes' => $recipes]);

})->name('index');

Route::resource('recipes', \App\Http\Controllers\RecipesController::class);
Route::resource('ingredients', \App\Http\Controllers\IngredientController::class);
