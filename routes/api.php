<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/add', [ProductController::class, 'add']);
Route::get('/getProducts', [ProductController::class, 'getProducts']);
Route::get('/searchByName/{product_name}', [ProductController::class, 'searchByName']);
Route::get('/showDetails/{id}', [ProductController::class, 'show']);
Route::post('/addLike/{id}/{num_likes}', [ProductController::class, 'addLike']);//notDone
Route::get('/sorting/{type}', [ProductController::class, 'sorting']);
Route::post('/Register', [UserController::class, 'Register']);
Route::delete('/destroy/{id}', [ProductController::class, 'destroy']);

