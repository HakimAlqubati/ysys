<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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
//     return view('welcome');
// });



Route::apiResource('posts',  PostController::class);

Auth::routes();


Route::get('/add-post', [PostController::class, 'create']);



Route::get('/edit-post/{id}', [PostController::class, 'edit']);
Route::post('/update-post/{id}', [PostController::class, 'update']);
Route::get('/delete/{id}', [PostController::class, 'destroy']);



Route::get('/log-out', [PostController::class, 'logout']);
