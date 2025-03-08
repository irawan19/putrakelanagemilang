<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    protected $table = 'pesans';
    protected $primaryKey = 'id_pesans';


    protected $fillable = [
        'email_pesans',
        'telepon_pesans',
        'nama_pesans',
        'konten_pesans',
        'status_baca_pesans',
    ];
}
