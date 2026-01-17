<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori; 
use App\Models\Obat;     
use App\Models\User;     
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Opsional: Matikan foreign key check dan kosongkan tabel agar tidak error saat running ulang
        Schema::disableForeignKeyConstraints();
        Kategori::truncate();
        Obat::truncate();
        Schema::enableForeignKeyConstraints();

        // 1. Buat Kategori (Menambahkan 2 kategori baru + 1 dasar)
        $kat1 = Kategori::create(['nama_kategori' => 'Analgesik']);
        $kat2 = Kategori::create(['nama_kategori' => 'Antibiotik']); // Tambahan 1
        $kat3 = Kategori::create(['nama_kategori' => 'Vitamin']);    // Tambahan 2

        // 2. Buat Data Obat Contoh
        Obat::create([
            'nama' => 'Paracetamol',
            'id_kategori' => $kat1->id,
            'stok' => 100,
            'harga' => 50000,
            'expired_date' => '2026-12-01'
        ]);

        Obat::create([
            'nama' => 'Amoxicillin',
            'id_kategori' => $kat2->id,
            'stok' => 50,
            'harga' => 10000,
            'expired_date' => '2026-11-01'
        ]);

        // Tetap pertahankan user default jika perlu
        User::factory()->create([
            'name' => 'Admin Apotek',
            'email' => 'admin@example.com',
        ]);
    }
}