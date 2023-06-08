<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('home'); });
Route::get('/signup', [LinkController::class, 'signupLink']);
Route::get('/login', [LinkController::class, 'loginLink'])->name("login");
Route::get('/comingsoon', function () { return view('comingsoon'); });
Route::post('/signupFunction', [UserController::class, 'signupFunction']);
Route::post('/loginFunction', [UserController::class, 'loginFunction']);
