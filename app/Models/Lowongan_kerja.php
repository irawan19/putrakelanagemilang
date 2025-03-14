<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan_kerja extends Model
{
    use HasFactory;
    protected $table = 'lowongan_kerjas';
    protected $primaryKey = 'id_lowongan_kerjas';
    
    protected $fillable = [
        'gambar_lowongan_kerjas',
        'judul_lowongan_kerjas',
        'slug_lowongan_kerjas',
        'sekilas_konten_lowongan_kerjas',
        'konten_lowongan_kerjas',
    ];
}