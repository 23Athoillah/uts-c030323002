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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nisn')->unique(); // Nomor Induk Siswa Nasional
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin'); // 'L' untuk Laki-laki, 'P' untuk Perempuan
            $table->string('alamat');
            $table->string('email')->unique();
            $table->string('no_telepon');
            $table->string('asal_sekolah');
            $table->string('jurusan_pilihan'); // Misalnya IPA atau IPS
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
