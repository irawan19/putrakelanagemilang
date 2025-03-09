<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    use HasFactory;
    protected $table = 'slideshows';
    protected $primaryKey = 'id_slideshows';


    protected $fillable = [
        'judul_slideshows',
        'text1_slideshows',
        'text2_slideshows',
        'gambar_slideshows',
    ];
}
