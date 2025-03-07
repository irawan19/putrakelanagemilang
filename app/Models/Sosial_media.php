<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sosial_media extends Model
{
    use HasFactory;
    protected $table = 'sosial_media';
    protected $primaryKey = 'id_sosial_medias';

    protected $fillable = [
        'icon_sosial_medias',
        'url_sosial_medias',
    ];
}