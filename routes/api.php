<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
Route::get('/sershByName', [ProductController::class, 'sershByName']);
Route::get('/showDetails', [ProductController::class, 'show']);
Route::post('/addFav', [ProductController::class, 'addFav']);
Route::post('/sortion', [ProductController::class, 'sortion']);
Route::delete('/delete', [ProductController::class, 'destroy']);

