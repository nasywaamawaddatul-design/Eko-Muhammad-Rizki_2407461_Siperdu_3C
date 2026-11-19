<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;

// ===== POV USER ===== //
Route::get('/', [HomeController::class, 'beranda'])->name('user.beranda');
Route::get('/katalog-buku', [HomeController::class, 'katalogBuku'])->name('user.katalog-buku');

// ===== POV ADMIN ===== //
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('buku', BukuController::class);
    Route::resource('kategori', KategoriController::class)->except('show');
});
