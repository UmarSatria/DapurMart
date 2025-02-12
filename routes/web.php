<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FilterKategoriController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'verify' => true,
]);

Route::resource('grosir', UserController::class)->middleware('verified');
Route::resource('welcome', Controller::class);

Route::group(['middleware' => ['auth']], function () {

    Route::resource('shop', ShopController::class);
    Route::resource('chart', ChartController::class);

});


Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::resource('home', HomeController::class);
    Route::resource('sosmed', SosmedController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('barang', BarangController::class);

    Route::get('galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
    Route::get('galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::post('galeri', [GaleriController::class, 'store'])->name('galeri.store');
    Route::put('/galeri/{galeri}', [GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{galeri}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

     Route::post('/sosmed', [SosmedController::class, 'store'])->name('sosmed.store');
    Route::get('/sosmed/{sosmed}/edit', [SosmedController::class, 'edit'])->name('sosmed.edit');
    Route::put('/sosmed/{sosmed}', [SosmedController::class, 'update'])->name('sosmed.update');
    Route::delete('/sosmed/{sosmed}', [SosmedController::class, 'destroy'])->name('sosmed.destroy');
});


Route::resource('pesanan', PesananController::class);

Route::resource('filter-kategori', FilterKategoriController::class);

Route::get('kategori/{kategori}', [KategoriController::class, 'show'])->name('kategori.show');
Route::resource('pembayaran', PembayaranController::class);

Route::get('pesanan/{id}/edit-status', 'PesananController@editStatus')->name('pesanan.editStatus');
Route::put('pesanan/{id}/update-status', [PesananController::class, 'updateStatus'])->name('update_status');
