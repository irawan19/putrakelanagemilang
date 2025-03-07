<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
    use HasFactory;
    protected $table = 'aplikasis';
    protected $primaryKey = 'id_aplikasis';

    protected $fillable = [
        'nama_aplikasis',
        'deskripsi_aplikasis',
        'keyword_aplikasis',
        'icon_aplikasis',
        'logo_aplikasis',
        'logo_text_aplikasis'
    ];
}
