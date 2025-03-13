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
        'url_alamat_kontaks',
    ];
}
