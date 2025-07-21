<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        {
            Kelas::create(['nama_kelas' => 'TK Kecil', 'tahun_ajaran' => '2024/2025']);
            Kelas::create(['nama_kelas' => 'TK Besar', 'tahun_ajaran' => '2024/2025']);
        }
    }
}
