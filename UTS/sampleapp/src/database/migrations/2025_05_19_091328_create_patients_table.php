<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pasien
            $table->enum('gender', ['Laki-laki', 'Perempuan']); // Jenis kelamin
            $table->date('birth_date'); // Tanggal lahir
            $table->string('nik')->unique(); // Nomor Induk Kependudukan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
