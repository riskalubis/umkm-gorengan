<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;

Route::get('/', [PelangganController::class, 'home'])->name('pelanggan.home');
Route::get('/pesanan/{kode}', [PelangganController::class, 'status'])->name('pelanggan.status');
Route::post('/checkout', [PelangganController::class, 'checkout'])->name('pelanggan.checkout');

Route::get('/login-admin', fn()=>redirect()->route('login'))->name('admin.login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/admin', [AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/admin/page/{page}', [AdminController::class,'page'])->name('admin.page');

    Route::post('/admin/produk', [AdminController::class,'storeProduk']);
    Route::put('/admin/produk/{produk}', [AdminController::class,'updateProduk']);
    Route::delete('/admin/produk/{produk}', [AdminController::class,'destroyProduk']);

    Route::post('/admin/persediaan', [AdminController::class,'storePersediaan']);
    Route::put('/admin/persediaan/{persediaan}', [AdminController::class,'updatePersediaan']);

    Route::put('/admin/penjualan/{pesanan}/status', [AdminController::class,'updateStatus']);

    Route::get('/kategori', [KategoriController::class,'index'])->name('kategori.index');
    Route::post('/kategori', [KategoriController::class,'store'])->name('kategori.store');
    Route::put('/kategori/{kategori}', [KategoriController::class,'update'])->name('kategori.update');
    Route::delete('/kategori/{kategori}', [KategoriController::class,'destroy'])->name('kategori.destroy');

    Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class,'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class,'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
