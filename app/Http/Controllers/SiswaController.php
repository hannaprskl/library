<?php
namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::orderBy('no_pendaftaran', 'desc')->paginate(20);
        return view('siswas.index', compact('siswas'));
    }
    public function create()
    {
        return view('siswas.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'no_pendaftaran' => 'required|unique:siswas',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswas.index')->with('success', 'Siswa berhasil ditambahkan');
    }
    public function report()
    {
        $siswas = Siswa::orderBy('no_pendaftaran', 'desc')->get();
        return view('siswas.report', compact('siswas'));
    }
    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswas.show', compact('siswa'));
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id); 
        $siswa->delete(); 
        return redirect()->route('siswas.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
