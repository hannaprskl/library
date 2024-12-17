<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * 
     *
     * @return void
     */
    public function run()
    {
        Buku::create([
            'judul' => 'Pemrograman Web dengan Laravel',
            'penulis' => 'John Doe',
            'tahun_terbit' => '2023',
            'penerbit' => 'Tech Books Publishing',
            'isbn' => '978-1234567890',
        ]);
    
    }
}
