<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{ // <--- KURUNG INI TADI HILANG, JADI ERROR

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'obat_id' => 'required|array',
            'jumlah' => 'required|array',
        ]);

        try {
            DB::transaction(function () use ($request) {
                // 1. Simpan Transaksi Induk
                $transaksi = Transaksi::create([
                    'id_pelanggan' => $request->id_pelanggan,
                    'total' => $request->total,
                    'bayar' => $request->bayar,
                    'kembalian' => $request->bayar - $request->total,
                ]);

                // 2. Loop Item Obat
                foreach ($request->obat_id as $index => $id_obat) {
                    $qtyBeli = $request->jumlah[$index];
                    $obat = Obat::findOrFail($id_obat);

                    // SISTEM STOK: Cek Kecukupan
                    if ($obat->stok < $qtyBeli) {
                        throw new \Exception("Stok {$obat->nama} tidak cukup! Sisa: {$obat->stok}");
                    }

                    // SISTEM STOK: Potong Stok
                    $obat->decrement('stok', $qtyBeli);

                    // 3. Simpan Detail untuk Dashboard
                    DetailTransaksi::create([
                        'id_transaksi' => $transaksi->id,
                        'id_obat'      => $id_obat,
                        'jumlah'       => $qtyBeli,
                        'subtotal'     => $obat->harga * $qtyBeli
                    ]);
                }
            });

            return redirect()->route('dashboard')->with('success', 'Transaksi Berhasil!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
