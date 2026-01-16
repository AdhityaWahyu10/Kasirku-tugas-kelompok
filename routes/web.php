<?php

use Illuminate\Support\Facades\Route;

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