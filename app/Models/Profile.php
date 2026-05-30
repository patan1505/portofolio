<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    
    protected $fillable = [
        'nama_lengkap', 'foto_profil', 
        'teks_kiri_1', 'teks_kiri_2', 'teks_kiri_3',
        'teks_kanan_1', 'teks_kanan_2', 'teks_kanan_3',
        'tagline', 'cerita_perjalanan', 'edukasi_sekolah', 
        'edukasi_jurusan', 'hobi_1', 'hobi_2', 'motto',
        'email_aktif', 'lokasi'
    ];
}