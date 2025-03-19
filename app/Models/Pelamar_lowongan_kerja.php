<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar_lowongan_kerja extends Model
{
    use HasFactory;
    protected $table = 'pelamar_lowongan_kerjas';
    protected $primaryKey = 'id_pelamar_lowongan_kerjas';

    protected $fillable = [
        'lowongan_kerjas_id',
        'nama_lengkap_pelamar_lowongan_kerjas',
        'telepon_pelamar_lowongan_kerjas',
        'email_pelamar_lowongan_kerjas',
        'cv_pelamar_lowongan_kerjas',
    ];
}