<?php


use App\Http\Controllers\AuthConroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index'])->middleware('isLogin');

Route::get('login', [AuthConroller::class, 'login']);
Route::post('login', [AuthConroller::class, 'authenticate']);
Route::get('logout', [AuthConroller::class, 'logout']);
Route::get('register', [AuthConroller::class, 'register_form']);
Route::post('register', [AuthConroller::class, 'register']);

Route::get('posts', [PostController::class, 'index'])->middleware('isLogin');
Route::get('posts/create', [PostController::class, 'create']);
Route::get('posts/{id}', [PostController::class, 'show']);
Route::post('posts', [PostController::class, 'store']);
Route::get('posts/{id}/edit', [PostController::class, 'edit']);
Route::patch('posts/{id}', [PostController::class, 'update']);
Route::delete('posts/{id}', [PostController::class, 'destroy']);


