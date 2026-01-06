<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Obat;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    // 1. Tampilkan semua obat
    public function index()
    {
        $obat = Obat::with('kategori')->get();
        return view('kasir.index', compact('obat'));
    }

    // 2. Tampilkan form transaksi
    public function create()
    {
        $obat = Obat::all();
        $pelanggan = Pelanggan::all();
        return view('kasir.create', compact('obat', 'pelanggan'));
    }

    // 3. Simpan transaksi
    public function store(Request $request)
    {
        DB::transaction(function() use ($request) {
            $transaksi = Transaksi::create([
                'id_pelanggan' => $request->id_pelanggan,
                'total' => $request->total,
                'bayar' => $request->bayar,
                'kembalian' => $request->bayar - $request->total,
            ]);

            foreach($request->obat_id as $index => $id_obat){
                $obat = Obat::find($id_obat);
                $jumlah = $request->jumlah[$index];
                $subtotal = $obat->harga * $jumlah;

                DetailTransaksi::create([
                    'id_transaksi' => $transaksi->id,
                    'id_obat' => $id_obat,
                    'jumlah' => $jumlah,
                    'subtotal' => $subtotal
                ]);

                // Kurangi stok obat
                $obat->decrement('stok', $jumlah);
            }
        });

        return redirect()->route('kasir.index')->with('success', 'Transaksi berhasil disimpan!');
    }

    // 4. Tampilkan semua transaksi
    public function transaksi()
    {
        $transaksi = Transaksi::with('pelanggan', 'detail.obat')->get();
        return view('kasir.transaksi', compact('transaksi'));
    }
}
