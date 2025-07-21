<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kelas', 'tahun_ajaran'];

    public function anaks()
    {
        return $this->hasMany(Anak::class);
    }
}
