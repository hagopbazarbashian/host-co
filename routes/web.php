<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
// Home Page
Route::get('/',[HomeController::class , 'index'])->name('home');
// Login page
Route::get('free-trial',[LoginController::class , 'index'])->name('free_trial');
// Register
Route::get('register',[RegisterController::class , 'index'])->name('register');
