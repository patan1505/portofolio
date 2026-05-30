<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Achievement;
use App\Models\Project;
use App\Models\SocialLink;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat User Admin
        User::create([
            'name' => 'Paduka Raja',
            'email' => 'sayapatan580@gmail.com',
            'password' => Hash::make('15090605'),
        ]);

        // 2. Buat Profile (Beranda & Tentang Saya)
        Profile::create([
            'nama_lengkap' => 'Paduka Raja',
            'foto_profil' => null,
            'teks_kiri_1' => 'Web Developer',
            'teks_kiri_2' => 'PHP • Laravel',
            'teks_kiri_3' => 'Suka ngoding sejak SMK',
            'teks_kanan_1' => 'Back-End Specialist',
            'teks_kanan_2' => 'MySQL • Git',
            'teks_kanan_3' => 'Suka mancing & nulis blog',
            'tagline' => 'Membangun solusi digital satu kode pada satu waktu',
            'cerita_perjalanan' => 'Perjalanan saya dimulai dari SMK Negeri 2 Padang Panjang jurusan RPL. Awalnya penasaran bagaimana website bekerja, lalu mulai belajar PHP dan akhirnya jatuh cinta dengan Laravel karena strukturnya yang rapi dan elegan.',
            'edukasi_sekolah' => 'SMK Negeri 2 Padang Panjang',
            'edukasi_jurusan' => 'Rekayasa Perangkat Lunak (RPL)',
            'hobi_1' => 'Memancing',
            'hobi_2' => 'Mengelola blog lirik lagu (cosmic-lyrics.blogspot.com)',
            'motto' => '"Kode yang baik adalah kode yang bisa dipahami 6 bulan kemudian"',
            'email_aktif' => 'padukaraja@email.com',
            'lokasi' => 'Padang Panjang',
        ]);

        // 3. Buat Skills
        $skills = [
            ['nama' => 'PHP', 'kategori' => 'Back-End', 'urutan' => 1],
            ['nama' => 'Laravel', 'kategori' => 'Back-End', 'urutan' => 2],
            ['nama' => 'MySQL', 'kategori' => 'Database', 'urutan' => 3],
            ['nama' => 'Git', 'kategori' => 'Tools', 'urutan' => 4],
            ['nama' => 'HTML/CSS', 'kategori' => 'Front-End', 'urutan' => 5],
            ['nama' => 'JavaScript', 'kategori' => 'Front-End', 'urutan' => 6],
        ];
        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // 4. Buat Prestasi Contoh
        Achievement::create([
            'nama_prestasi' => 'Juara 1 Lomba Web Development Tingkat Kabupaten',
            'tahun' => '2024',
            'deskripsi' => 'Berhasil membuat aplikasi inventaris sekolah berbasis Laravel dalam waktu 8 jam.',
            'sertifikat' => null,
        ]);

        Achievement::create([
            'nama_prestasi' => 'Peserta Aktif Coding Camp 2023',
            'tahun' => '2023',
            'deskripsi' => 'Mengikuti bootcamp intensif Laravel selama 3 bulan.',
            'sertifikat' => null,
        ]);

        // 5. Buat Project Contoh
        Project::create([
            'judul' => 'Nutrobot - Bot Telegram',
            'deskripsi' => 'Bot Telegram untuk informasi nutrisi makanan menggunakan Laravel dan Telegram Bot API.',
            'tech_stack' => 'Laravel, Bot API, MySQL',
            'screenshot' => null,
            'video_link' => null,
            'demo_link' => 'https://t.me/nutrobot',
            'github_link' => 'https://github.com/padukaraja/nutrobot',
            'status' => 'Selesai',
            'urutan' => 1,
        ]);

        Project::create([
            'judul' => 'Portfolio Website',
            'deskripsi' => 'Website portfolio pribadi dengan admin dashboard untuk mengelola konten.',
            'tech_stack' => 'Laravel, TailwindCSS, MySQL',
            'screenshot' => null,
            'video_link' => null,
            'demo_link' => '/',
            'github_link' => 'https://github.com/padukaraja/portfolio',
            'status' => 'Selesai',
            'urutan' => 2,
        ]);

        // 6. Buat Social Links
        $socials = [
            ['platform' => 'GitHub', 'url' => 'https://github.com/padukaraja', 'urutan' => 1],
            ['platform' => 'LinkedIn', 'url' => 'https://linkedin.com/in/padukaraja', 'urutan' => 2],
            ['platform' => 'Blog', 'url' => 'https://cosmic-lyrics.blogspot.com', 'urutan' => 3],
        ];
        foreach ($socials as $social) {
            SocialLink::create($social);
        }
    }
}