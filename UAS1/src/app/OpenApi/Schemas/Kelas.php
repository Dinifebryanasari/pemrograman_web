<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="Kelas",
 *     title="Kelas",
 *     type="object",
 *     required={"nama_kelas", "tahun_ajaran"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="nama_kelas", type="string", example="TK B"),
 *     @OA\Property(property="tahun_ajaran", type="string", example="2024/2025"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-07-21T10:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-07-21T10:00:00Z")
 * )
 */
class Kelas {}
