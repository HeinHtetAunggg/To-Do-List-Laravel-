<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TaskInputController;
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

Route::get('/',[MainController::class,'index'])->middleware('guest');
Route::get('/users/{user:username}',[MainController::class,'create'])->middleware('auth');

Route::get('/register',[AuthController::class,'create'])->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->middleware('guest');

Route::post('/users/{user:username}/taskinput',[TaskInputController::class,'store'])->middleware('auth');
Route::get('/users/{user:username}/edit',[AuthController::class,'edit'])->middleware('auth');
Route::patch('/users/{user:username}/update',[AuthController::class,'update'])->middleware('auth');

Route::get('/login',[AuthController::class,'login'])->middleware('guest');
Route::post('/login',[AuthController::class,'account_login'])->middleware('guest');

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::delete('/users/{user:username}/taskinputs/{taskinput:body}/delete',[MainController::class,'destroy']);
