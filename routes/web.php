<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// HOME PAGE WEB
Route::get('/grosir', function () {
    return view('layouts.grosir');
})->name('grosir');

// LOGIN PAGE
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLogin'])->name('login');
Auth::routes();

// login admin
Route::middleware(['auth', 'role:Admin'])->group(function (){
    Route::resource('home', HomeController::class);
});

