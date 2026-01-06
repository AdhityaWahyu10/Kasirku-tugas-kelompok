<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable = ['nama', 'deskripsi'];

    // Relasi: Kategori memiliki banyak Obat
    public function obat()
    {
        return $this->hasMany(Obat::class, 'id_kategori');
    }
}
