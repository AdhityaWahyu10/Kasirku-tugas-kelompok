<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =======================
// HALAMAN UTAMA
// =======================
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// =======================
// DASHBOARD
// =======================
Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard');
// =======================
// KASIR (UI LAMA & BARU)
// =======================

// UI kasir lama (jika masih dipakai)
Route::get('/cashier', function () {
    return view('cashier'); 
})->name('cashier');

// CRUD Kasir Apotek Baru (Controller)
Route::prefix('kasir')->group(function () {

    // Daftar obat / halaman utama kasir
    Route::get('/', [KasirController::class, 'index'])
        ->name('kasir.index');

    // Form tambah transaksi
    Route::get('/create', [KasirController::class, 'create'])
        ->name('kasir.create');

    // Simpan transaksi
    Route::post('/store', [KasirController::class, 'store'])
        ->name('kasir.store');

    // Log transaksi
    Route::get('/transaksi', [KasirController::class, 'transaksi'])
        ->name('kasir.transaksi');
});

// =======================
// HALAMAN PENDUKUNG
// =======================

// Log transaksi (view statis)
Route::get('/log-transaksi', function () {
    return view('log'); 
})->name('log-transaksi');
// Checkout
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');
