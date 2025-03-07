<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    protected $table = 'kontaks';
    protected $primaryKey = 'id_kontaks';

    protected $fillable = [
        'email_pesans',
        'telepon_pesans',
        'nama_pesans',
        'konten_pesans',
    ];
}
