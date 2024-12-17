<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * 
     *
     * @return void
     */
    public function run()
    {
        Siswa::create([
            'no pendaftaran' => '1',
            'nama' => 'shifa',
            'alamat' => 'Jl. Merdeka No. 1',
            'tanggal_lahir' => '2000-01-01',
            'jenis_kelamin' => 'Laki-laki',
        ]);
        Siswa::create([
            'no pendaftaran' => '2',
            'nama' => 'nana',
            'alamat' => 'Jl. Merdeka No. 1',
            'tanggal_lahir' => '2000-01-02',
            'jenis_kelamin' => 'Perempuan',
        ]);
    }
}
