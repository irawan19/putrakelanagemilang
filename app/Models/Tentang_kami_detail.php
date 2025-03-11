<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang_kami_detail extends Model
{
    use HasFactory;
    protected $table = 'tentang_kami_details';
    protected $primaryKey = 'id_tentang_kami_details';

    protected $fillable = [
        'icon_tentang_kami_details',
        'judul_tentang_kami_details',
        'konten_tentang_kami_details',
    ];
}