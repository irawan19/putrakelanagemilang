<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $table = 'testimonials';
    protected $primaryKey = 'id_testimonials';

    protected $fillable = [
        'gambar_testimonials',
        'nama_testimonials',
        'jabatan_testimonials',
        'konten_testimonials',
    ];
}