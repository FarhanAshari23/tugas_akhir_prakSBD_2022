<?php

use App\Http\Controllers\PembeliController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\HomeController;
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
//     return view('admin.index');
// });

Route::get('/home', [PembeliController::class, 'index'])->name('pembeli.index');
Route::get('pembeli_add', [PembeliController::class, 'create'])->name('pembeli.create');
Route::post('store', [PembeliController::class, 'store'])->name('pembeli.store');
Route::get('pembeli_edit/{id}', [PembeliController::class, 'edit'])->name('pembeli.edit');
Route::post('pembeli_update/{id}', [PembeliController::class, 'update'])->name('pembeli.update');
Route::post('pembeli_delete/{id}', [PembeliController::class, 'delete'])->name('pembeli.delete');
Route::post('pembeli_softdelete/{id}', [PembeliController::class, 'softdelete'])->name('pembeli.softdelete');
Route::get('pembeli_restore/{id}', [PembeliController::class, 'restore'])->name('pembeli.restore');

Route::get('barang_add', [BarangController::class, 'createBarang'])->name('barang.create');
Route::post('barang_store', [BarangController::class, 'storeBarang'])->name('barang.store');
Route::get('barang_edit/{id}', [BarangController::class, 'editBarang'])->name('barang.edit');
Route::post('barang_update/{id}', [BarangController::class, 'updateBarang'])->name('barang.update');
Route::post('barang_delete/{id}', [BarangController::class, 'deleteBarang'])->name('barang.delete');
Route::post('barang_softdelete/{id}', [BarangController::class, 'softdeleteBarang'])->name('barang.softdelete');
Route::get('barang_restore/{id}', [BarangController::class, 'restoreBarang'])->name('barang.restore');
Route::get('barang_bin', [BarangController::class, 'barangBin'])->name('barang.bin');

Route::get('pembayaran_add', [PembayaranController::class, 'createPembayaran'])->name('pembayaran.create');
Route::post('pembayaran_store', [PembayaranController::class, 'storePembayaran'])->name('pembayaran.store');
Route::post('pembayaran_update/{id}', [PembayaranController::class, 'updatePembayaran'])->name('pembayaran.update');
Route::post('pembayaran_delete/{id}', [PembayaranController::class, 'deletePembayaran'])->name('pembayaran.delete');

Route::get('pesanan', [PesananController::class, 'indexPesanan'])->name('pesanan.index');
Route::get('pesanan_add', [PesananController::class, 'createPesanan'])->name('pesanan.create');
Route::post('pesanan_store', [PesananController::class, 'storePesanan'])->name('pesanan.store');
Route::get('pesanan_edit/{id}', [PesananController::class, 'editPesanan'])->name('pesanan.edit');
Route::post('pesanan_update/{id}', [PesananController::class, 'updatePesanan'])->name('pesanan.update');
Route::post('pesanan_delete/{id}', [PesananController::class, 'deletePesanan'])->name('pesanan.delete');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
