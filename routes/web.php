<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodTypeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RecipeController;
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

// Route::get('/', function () {
// return view('welcome');
// });
Route::redirect('/', '/login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('administrate')->group(function () {
        Route::resource('categories', CategoryController::class)
        ->except(['index', 'show']);

        Route::resource('types', FoodTypeController::class)
        ->except(['index', 'show']);

        Route::resource('plans', PlanController::class)
        ->except(['index', 'show']);

        Route::resource('categories.recipes', RecipeController::class)
        ->shallow()
        ->only(['store', 'create', 'edit', 'update', 'destroy']);
    });

    Route::resource('categories', CategoryController::class)
    ->only(['index', 'show']);

    Route::get('recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');

    Route::resource('types', FoodTypeController::class)
    ->only(['index', 'show']);

    Route::resource('plans', PlanController::class)
    ->only(['index', 'show']);
});
