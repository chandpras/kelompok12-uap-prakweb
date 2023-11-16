<?php

namespace App\Database\Seeds;

use App\Models\KategoriModel;
use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $kategoriModel = new KategoriModel();

        $kategoriModel->save([
            'nama_kategori' => 'Komputer/Teknologi Informasi'
        ]);
        $kategoriModel->save([
            'nama_kategori' => 'Akuntansi'
        ]);
        $kategoriModel->save([
            'nama_kategori' => 'Teknik'
        ]);
        $kategoriModel->save([
            'nama_kategori' => 'Sains'
        ]);
        $kategoriModel->save([
            'nama_kategori' => 'Seni/Media'
        ]);
        $kategoriModel->save([
            'nama_kategori' => 'Pendidikan'
        ]);
    }
}
