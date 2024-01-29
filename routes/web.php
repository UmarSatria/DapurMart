<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// LOGIN PAGE
// Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLogin'])->name('login');
Auth::routes([
    'verify'=>true
]);

Route::group(['middleware' => ['auth']], function(){
    Route::resource('grosir', UserController::class)->middleware('verified');
});

// login admin
Route::middleware(['auth', 'role:Admin'])->group(function (){
    Route::resource('home', HomeController::class);
});


// HOME PAGE WEB
// Route::get('/grosir', function () {
//     return view('layouts.grosir');
// })->name('grosir');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

// Route::get('admin', function(){
//     return view('layouts.sidebar');
// });



Route::resource('kategori', KategoriController::class);

Route::resource('barang', BarangController::class);



