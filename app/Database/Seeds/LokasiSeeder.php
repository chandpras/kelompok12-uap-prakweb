<?php

namespace App\Database\Seeds;

use App\Models\LokasiModel;
use CodeIgniter\Database\Seeder;

class LokasiSeeder extends Seeder
{
    public function run()
    {
        $lokasiModel = new LokasiModel();

        $lokasiModel->save([
            'nama_lokasi' => 'Lampung'
        ]);
        $lokasiModel->save([
            'nama_lokasi' => 'Jakarta'
        ]);
        $lokasiModel->save([
            'nama_lokasi' => 'Bandung'
        ]);
        $lokasiModel->save([
            'nama_lokasi' => 'Balikpapan'
        ]);
        $lokasiModel->save([
            'nama_lokasi' => 'Bali'
        ]);
        
    }
}
