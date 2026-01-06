<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';
    protected $fillable = ['id_transaksi', 'id_obat', 'jumlah', 'subtotal'];

    // Relasi: Detail milik Transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    // Relasi: Detail milik Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
