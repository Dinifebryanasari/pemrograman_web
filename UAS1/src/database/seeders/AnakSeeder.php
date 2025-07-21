<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anak;

class AnakSeeder extends Seeder
{
    public function run(): void
    {
        Anak::create([
            'nama' => 'Budi',
            'tanggal_lahir' => '2019-05-15',
            'jenis_kelamin' => 'Laki-laki',
            'nama_ortu' => 'Pak Ahmad',
            'alamat' => 'Jl. Mawar No. 123',
            'kelas_id' => 1
        ]);
    }
}
