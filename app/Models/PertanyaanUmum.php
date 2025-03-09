<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanUmum extends Model
{
    use HasFactory;
    protected $table = 'pertanyaan_umums';
    protected $primaryKey = 'id_pertanyaan_umums';


    protected $fillable = [
        'pertanyaan_pertanyaan_umums',
        'jawaban_pertanyaan_umums',
    ];
}
