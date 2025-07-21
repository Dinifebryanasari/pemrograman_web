<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="Anak",
 *     title="Anak",
 *     description="Schema untuk data Anak TK",
 *     type="object",
 *     required={
 *         "nama", 
 *         "tanggal_lahir", 
 *         "jenis_kelamin", 
 *         "nama_ortu", 
 *         "alamat", 
 *         "kelas_id"
 *     },
 *
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="nama",
 *         type="string",
 *         example="Adit"
 *     ),
 *     @OA\Property(
 *         property="tanggal_lahir",
 *         type="string",
 *         format="date",
 *         example="2018-04-10"
 *     ),
 *     @OA\Property(
 *         property="jenis_kelamin",
 *         type="string",
 *         enum={"Laki-laki", "Perempuan"},
 *         example="Laki-laki"
 *     ),
 *     @OA\Property(
 *         property="nama_ortu",
 *         type="string",
 *         example="Ibu Rini"
 *     ),
 *     @OA\Property(
 *         property="alamat",
 *         type="string",
 *         example="Jl. Melati No. 12"
 *     ),
 *     @OA\Property(
 *         property="kelas_id",
 *         type="integer",
 *         example=2
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         example="2025-07-21T10:00:00Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         example="2025-07-21T10:15:00Z"
 *     )
 * )
 */
class Anak {}
