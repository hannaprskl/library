<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $dataDiri = [
            'nama' => 'Uhuyy',
            'kelas' => 'IF 3C',
            'mata_kuliah' => ['Pemrograman Web', 'Jaringan Komputer', 'Basis Data'],
        ];
        return view('home', compact('dataDiri'));
    }
}
