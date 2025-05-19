<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    public function run()
    {
        Patient::create([
            'name' => 'Aulia Rahmawati',
            'gender' => 'Perempuan',
            'birth_date' => '1997-05-22',
            'nik' => '1234567890'
        ]);
    }
}