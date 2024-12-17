<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTanggalPengembalianToPeminjamanBukusTable extends Migration
{
    public function up()
    {
        Schema::table('peminjaman_bukus', function (Blueprint $table) {
            $table->date('tanggal_pengembalian')->nullable(); // Kolom untuk tanggal pengembalian
        });
    }

    public function down()
    {
        Schema::table('peminjaman_bukus', function (Blueprint $table) {
            $table->dropColumn('tanggal_pengembalian');
        });
    }
}
