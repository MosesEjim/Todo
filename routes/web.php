<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('todos', TodoController::class)->middleware('auth');


Route::get('/login', [UserController::class, 'login'])->name('login.get');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.post');
Route::get('/signup', [UserController::class, 'signup'])->name('signup.get');
Route::post('/signup', [UserController::class, 'store'])->name('signup.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout.post');
