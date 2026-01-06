<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('cashier');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });