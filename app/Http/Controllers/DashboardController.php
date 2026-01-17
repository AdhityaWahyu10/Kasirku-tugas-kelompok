<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Hapus baris use yang lama, kita panggil langsung di bawah agar pasti ketemu
class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil item yang baru saja terjual
        $history = \App\Models\DetailTransaksi::with(['obat.kategori', 'transaksi'])
            ->latest()
            ->get();

        return view('dashboard', compact('history'));
    }
}
