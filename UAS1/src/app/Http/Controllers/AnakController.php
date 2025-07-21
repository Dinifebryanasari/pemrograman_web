<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anak;
use App\Models\Kelas;

class AnakController extends Controller
{
    public function create()
    {
        $kelas = Kelas::all(); // ambil semua data kelas
        return view('anaks.create', compact('kelas')); // kirim ke view
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kelas_id' => 'required',
        ]);

        Anak::create($request->all());

        return redirect()->route('anaks.index')
                         ->with('success', 'Data anak berhasil ditambahkan.');
    }
}
