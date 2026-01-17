<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
public function index()
{
    // Mengambil data obat sekaligus dengan kategorinya (Eager Loading)
    $obats = \App\Models\Obat::with('kategori')->get();
    
    // Mengirim ke view dashboard
    return view('dashboard', compact('obats'));
}
}