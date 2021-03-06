<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route::group(['middleware' => ['auth:sanctum']], function () {

//     Route::get('posts/{id?}', [PostController::class, 'index']);
//     Route::post('/logout', [AuthController::class, 'logout']);
// });
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::apiResource('posts',  PostsController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});

 



// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::apiResource([PostController::class]);
// });
