<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanBuku;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanBukuController extends Controller
{
    public function index()
    {
        $peminjamanBukus = PeminjamanBuku::with(['buku', 'user'])
            ->orderBy('tanggal_peminjaman', 'desc')
            ->paginate(10);

        return view('peminjaman_buku.index', compact('peminjamanBukus'));
    }
    public function create()
    {
        $bukus = Buku::all();
        return view('peminjaman_buku.create', compact('bukus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required|string|exists:bukus,judul', 
            'tanggal_peminjaman' => 'required|date',
        ]);
        $buku = Buku::where('judul', $request->judul_buku)->firstOrFail();
    
        PeminjamanBuku::create([
            'user_id' => Auth::id(),
            'buku_id' => $buku->id,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
        ]);
    
        return redirect()->route('peminjaman_buku.index')->with('success', 'Peminjaman buku berhasil ditambahkan.');
    }
    public function returnBook($id)
    {
        $peminjaman = PeminjamanBuku::findOrFail($id);
        return view('peminjaman_buku.return', compact('peminjaman'));
    }
    public function updateReturn(Request $request, $id)
    {
        $request->validate([
            'tanggal_pengembalian' => 'required|date',
        ]);

        $peminjaman = PeminjamanBuku::findOrFail($id);
        $peminjaman->update([
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
        ]);

        return redirect()->route('peminjaman_buku.index')->with('success', 'Pengembalian buku berhasil.');
    }
    public function destroy($id)
    {
        $peminjaman = PeminjamanBuku::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman_buku.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
    public function report()
{
    $peminjamanBukus = PeminjamanBuku::with(['buku', 'user'])
        ->orderBy('tanggal_peminjaman', 'desc')
        ->get();
    return view('peminjaman_buku.report', compact('peminjamanBukus'));
}
                                                                                                    
}
