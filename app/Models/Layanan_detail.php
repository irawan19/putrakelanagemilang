<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan_detail extends Model
{
    use HasFactory;
    protected $table = 'layanan_details';
    protected $primaryKey = 'id_layanan_details';

    protected $fillable = [
        'gambar_layanan_details',
        'icon_layanan_details',
        'judul_layanan_details',
        'konten_layanan_details',
    ];
}