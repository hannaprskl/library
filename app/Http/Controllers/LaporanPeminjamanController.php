<?php
namespace App\Http\Controllers;

use App\Models\PeminjamanBuku;
use Illuminate\Http\Request;

class LaporanPeminjamanController extends Controller
{
    public function index()
    {
        $peminjamanBukus = PeminjamanBuku::with(['buku', 'user'])
            ->orderBy('tanggal_peminjaman', 'desc')
            ->get();

        return view('peminjaman_buku.report', compact('peminjamanBukus'));
    }
}

