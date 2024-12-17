<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::orderBy('judul', 'asc')->paginate(10);
        return view('bukus.index', compact('bukus'));
    }
    public function create()
    {
        return view('bukus.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'penerbit' => 'required|string|max:255',
            'isbn' => 'required|string|unique:bukus',
        ]);

        Buku::create($request->all());

        return redirect()->route('bukus.index')->with('success', 'Buku berhasil ditambahkan');
    }

public function destroy($id)
{
    $buku = Buku::findOrFail($id);
    $buku->delete();
    
    return redirect()->route('bukus.index')->with('success', 'Buku berhasil dihapus!');
}

}
