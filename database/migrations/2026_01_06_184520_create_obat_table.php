<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100); 
            $table->foreignId('id_kategori')->constrained('kategori')->onDelete('cascade');
            $table->integer('stok')->default(0);
            $table->decimal('harga', 12, 2);
            $table->date('expired_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};