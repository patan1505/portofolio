<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'judul', 'deskripsi', 'tech_stack', 'screenshot', 
        'video_link', 'demo_link', 'github_link', 'status', 'urutan'
    ];
}