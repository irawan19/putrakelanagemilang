<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang_kami extends Model
{
    use HasFactory;
    protected $table = 'tentang_kamis';
    protected $primaryKey = 'id_tentang_kamis';

    protected $fillable = [
        'text1_tentang_kamis',
        'text2_tentang_kamis',
        'gambar_tentang_kamis',
        'sekilas_tentang_kamis',
        'konten_tentang_kamis',
        'konten_footer_tentang_kamis',
    ];
}