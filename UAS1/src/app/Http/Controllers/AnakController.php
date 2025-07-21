<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Anak",
 *     description="Manajemen Data Anak TK"
 * )
 */
class AnakController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/anaks",
     *     tags={"Anak"},
     *     summary="Ambil semua data anak",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Data anak berhasil diambil"
     *     )
     * )
     */
    public function index()
    {
        $anaks = Anak::with('kelas')->get();
        return response()->json($anaks);
    }

    /**
     * @OA\Post(
     *     path="/api/anaks",
     *     tags={"Anak"},
     *     summary="Simpan data anak baru",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nama", "tanggal_lahir", "jenis_kelamin", "nama_ortu", "alamat", "kelas_id"},
     *             @OA\Property(property="nama", type="string"),
     *             @OA\Property(property="tanggal_lahir", type="string", format="date"),
     *             @OA\Property(property="jenis_kelamin", type="string", enum={"Laki-laki", "Perempuan"}),
     *             @OA\Property(property="nama_ortu", type="string"),
     *             @OA\Property(property="alamat", type="string"),
     *             @OA\Property(property="kelas_id", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Data anak berhasil disimpan"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nama_ortu' => 'required|string',
            'alamat' => 'required|string',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $anak = Anak::create($data);

        return response()->json($anak, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/anaks/{id}",
     *     tags={"Anak"},
     *     summary="Tampilkan data anak berdasarkan ID",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Data anak ditemukan"),
     *     @OA\Response(response=404, description="Data anak tidak ditemukan")
     * )
     */
    public function show($id)
    {
        $anak = Anak::with('kelas')->findOrFail($id);
        return response()->json($anak);
    }

    /**
     * @OA\Put(
     *     path="/api/anaks/{id}",
     *     tags={"Anak"},
     *     summary="Perbarui data anak",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="nama", type="string"),
     *             @OA\Property(property="tanggal_lahir", type="string", format="date"),
     *             @OA\Property(property="jenis_kelamin", type="string", enum={"Laki-laki", "Perempuan"}),
     *             @OA\Property(property="nama_ortu", type="string"),
     *             @OA\Property(property="alamat", type="string"),
     *             @OA\Property(property="kelas_id", type="integer")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Data anak berhasil diperbarui")
     * )
     */
    public function update(Request $request, $id)
    {
        $anak = Anak::findOrFail($id);

        $data = $request->validate([
            'nama' => 'sometimes|string',
            'tanggal_lahir' => 'sometimes|date',
            'jenis_kelamin' => 'sometimes|in:Laki-laki,Perempuan',
            'nama_ortu' => 'sometimes|string',
            'alamat' => 'sometimes|string',
            'kelas_id' => 'sometimes|exists:kelas,id',
        ]);

        $anak->update($data);

        return response()->json($anak);
    }

    /**
     * @OA\Delete(
     *     path="/api/anaks/{id}",
     *     tags={"Anak"},
     *     summary="Hapus data anak",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=204, description="Data anak berhasil dihapus")
     * )
     */
    public function destroy($id)
    {
        Anak::destroy($id);
        return response()->json(null, 204);
    }
}
