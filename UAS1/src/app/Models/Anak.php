<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anak extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'tanggal_lahir', 'jenis_kelamin', 'nama_ortu', 'alamat', 'kelas_id'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
