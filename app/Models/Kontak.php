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
        'telepon_kontaks',
        'email_kontaks',
        'alamat_kontaks',
        'lat_alamat_kontaks',
        'long_alamat_kontaks',
    ];
}
