<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanBukuTable extends Migration
{
    public function up()
    {
        Schema::create('peminjaman_buku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke user yang meminjam
            $table->foreignId('buku_id')->constrained()->onDelete('cascade'); // Relasi ke buku yang dipinjam
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')->nullable(); // Tanggal pengembalian (bisa kosong jika belum dikembalikan)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjaman_buku');
    }
}
