<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KasirController;

<<<<<<< HEAD
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route lama untuk kasir lama
Route::get('/', function () {
    return view('cashier'); // UI kasir lama
});

// Route CRUD Kasir Apotek baru
Route::prefix('kasir')->group(function () {
    // Tampilkan daftar obat
    Route::get('/', [KasirController::class, 'index'])->name('kasir.index');

    // Form tambah transaksi
    Route::get('/create', [KasirController::class, 'create'])->name('kasir.create');

    // Simpan transaksi baru
    Route::post('/store', [KasirController::class, 'store'])->name('kasir.store');

    // Tampilkan daftar semua transaksi
    Route::get('/transaksi', [KasirController::class, 'transaksi'])->name('kasir.transaksi');
});

// Jika ingin dashboard diaktifkan di masa depan, bisa pakai:
// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
=======
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/cashier', function () {
    return view('cashier');
})->name('cashier');

Route::get('/log-transaksi', function () {
    return view('log'); // <- ini sesuai file log.blade.php
})->name('log-transaksi');

// TAMBAHKAN ROUTE INI UNTUK CHECKOUT
Route::get('/checkout', function () {
    return view('checkout'); // Pastikan file checkout.blade.php ada di resources/views/
})->name('checkout');

Route::get('/', function () {
    return redirect()->route('dashboard');
});
>>>>>>> 25dad1ee0d27988db55bf98dc043eae45d242f26
