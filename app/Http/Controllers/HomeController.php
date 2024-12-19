<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $dataDiri = [
            'nama' => 'Eka Lusyanti Marpaung',
            'kelas' => 'SI503',
            'mata_kuliah' => 'Pemrograman Berbasis Web',
        ];
        return view('home', compact('dataDiri'));
    }
}
