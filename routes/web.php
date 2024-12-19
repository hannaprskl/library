<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanBukuController;
use App\Http\Controllers\LaporanPeminjamanController;


 
 
Route::get('/', function () {
    return view('welcome');
});
 
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::resource('siswas', SiswaController::class);
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::resource('bukus', BukuController::class);
Route::group(['middleware' => 'auth'], function () {
Route::resource('peminjaman_buku', PeminjamanBukuController::class);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('peminjaman_buku', PeminjamanBukuController::class)->middleware('auth');
    Route::get('peminjaman_buku/{id}/return', [PeminjamanBukuController::class, 'returnBook'])->name('peminjaman_buku.returnBook');
    Route::put('peminjaman_buku/{id}/return', [PeminjamanBukuController::class, 'updateReturn'])->name('peminjaman_buku.updateReturn');
    
});

    Route::get('peminjaman_buku/{id}/return', [PeminjamanBukuController::class, 'returnBook'])->name('peminjaman_buku.returnBook');
    Route::put('peminjaman_buku/{id}/return', [PeminjamanBukuController::class, 'updateReturn'])->name('peminjaman_buku.updateReturn');
});
Route::get('/laporan-peminjaman', [LaporanPeminjamanController::class, 'index'])->name('laporan-peminjaman');
Route::group(['middleware' => 'auth'], function () {
    Route::get('laporan-siswa', [SiswaController::class, 'report'])->name('laporan-siswa');
});
