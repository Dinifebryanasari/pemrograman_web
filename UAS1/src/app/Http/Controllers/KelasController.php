<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Kelas",
 *     description="Manajemen Data Kelas"
 * )
 */
class KelasController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/kelas",
     *     tags={"Kelas"},
     *     summary="Ambil semua data kelas",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\Response(response=200, description="Berhasil")
     * )
     */
    public function index()
    {
        $data = Kelas::with('anaks')->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar semua kelas',
            'data'    => $data,
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/kelas",
     *     tags={"Kelas"},
     *     summary="Simpan data kelas baru",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nama_kelas", "tahun_ajaran"},
     *             @OA\Property(property="nama_kelas", type="string", example="TK A"),
     *             @OA\Property(property="tahun_ajaran", type="string", example="2024/2025")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Kelas berhasil ditambahkan")
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kelas'   => 'required|string|max:255',
            'tahun_ajaran' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $kelas = Kelas::create($request->only(['nama_kelas', 'tahun_ajaran']));

        return response()->json([
            'success' => true,
            'message' => 'Kelas berhasil ditambahkan',
            'data'    => $kelas,
        ], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/kelas/{id}",
     *     tags={"Kelas"},
     *     summary="Ambil detail kelas berdasarkan ID",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Berhasil"),
     *     @OA\Response(response=404, description="Kelas tidak ditemukan")
     * )
     */
    public function show($id)
    {
        $kelas = Kelas::with('anaks')->find($id);

        if (!$kelas) {
            return response()->json([
                'success' => false,
                'message' => 'Kelas tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail kelas',
            'data'    => $kelas,
        ]);
    }

    /**
     * @OA\Put(
     *     path="/api/kelas/{id}",
     *     tags={"Kelas"},
     *     summary="Perbarui data kelas",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="nama_kelas", type="string", example="TK B"),
     *             @OA\Property(property="tahun_ajaran", type="string", example="2025/2026")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Kelas berhasil diperbarui"),
     *     @OA\Response(response=404, description="Kelas tidak ditemukan")
     * )
     */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return response()->json([
                'success' => false,
                'message' => 'Kelas tidak ditemukan',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_kelas'   => 'required|string|max:255',
            'tahun_ajaran' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $kelas->update($request->only(['nama_kelas', 'tahun_ajaran']));

        return response()->json([
            'success' => true,
            'message' => 'Kelas berhasil diperbarui',
            'data'    => $kelas,
        ]);
    }

    /**
     * @OA\Delete(
     *     path="/api/kelas/{id}",
     *     tags={"Kelas"},
     *     summary="Hapus data kelas berdasarkan ID",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Kelas berhasil dihapus"),
     *     @OA\Response(response=404, description="Kelas tidak ditemukan")
     * )
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return response()->json([
                'success' => false,
                'message' => 'Kelas tidak ditemukan',
            ], 404);
        }

        $kelas->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kelas berhasil dihapus',
        ]);
    }
}
