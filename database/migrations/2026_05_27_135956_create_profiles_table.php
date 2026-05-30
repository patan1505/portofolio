<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            // Beranda
            $table->string('nama_lengkap')->default('Paduka Raja');
            $table->string('foto_profil')->nullable();
            $table->string('teks_kiri_1')->default('Web Developer');
            $table->string('teks_kiri_2')->default('PHP • Laravel');
            $table->string('teks_kiri_3')->default('Suka ngoding sejak SMK');
            $table->string('teks_kanan_1')->default('Back-End Specialist');
            $table->string('teks_kanan_2')->default('MySQL • Git');
            $table->string('teks_kanan_3')->default('Suka mancing & nulis blog');
            $table->string('tagline')->nullable();
            // Tentang Saya
            $table->text('cerita_perjalanan')->nullable();
            $table->string('edukasi_sekolah')->default('SMK Negeri 2 Padang Panjang');
            $table->string('edukasi_jurusan')->default('Rekayasa Perangkat Lunak (RPL)');
            $table->string('hobi_1')->default('Memancing');
            $table->string('hobi_2')->default('Mengelola blog lirik lagu');
            $table->string('motto')->nullable();
            // Kontak
            $table->string('email_aktif')->default('padukaraja@email.com');
            $table->string('lokasi')->default('Padang Panjang');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};