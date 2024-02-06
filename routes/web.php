<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FilterKategoriController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ShopController;
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

Route::resource('grosir', UserController::class)->middleware('verified');
Route::resource('welcome', Controller::class);

Route::group(['middleware' => ['auth']], function(){

    Route::resource('shop', ShopController::class);
    Route::resource('chart', ChartController::class);

});

// login admin
Route::middleware(['auth', 'role:Admin'])->group(function (){
    Route::resource('home', HomeController::class);
});

// Route::middleware(['auth', 'role:User'])->group(function (){
//     Route::resource('grosir', UserController::class);
// });


// HOME PAGE WEB
// Route::get('/grosir', function () {
//     return view('layouts.grosir');
// })->name('grosir');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

// Route::get('admin', function(){
//     return view('layouts.sidebar');
// });



Route::resource('kategori', KategoriController::class);

Route::resource('barang', BarangController::class);

Route::resource('pesanan', PesananController::class);

Route::resource('coba', NavbarController::class);
Route::resource('filter-kategori', FilterKategoriController::class);

Route::get('kategori/{kategori}', [KategoriController::class, 'show'])->name('kategori.show');
Route::resource('pembayaran', PembayaranController::class);

Route::get('pesanan/{id}/edit-status', 'PesananController@editStatus')->name('pesanan.editStatus');
// Route::put('pesanan/{id}/update-status', 'PesananController@updateStatus')->name('update_status');
Route::put('pesanan/{id}/update-status', [PesananController::class, 'updateStatus'])->name('update_status');
