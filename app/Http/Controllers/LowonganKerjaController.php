<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Aplikasi;
use App\Models\Lowongan_kerja;

class LowonganKerjaController extends Controller {
    
    public function index()
    {
        $data['aplikasi']               = Aplikasi::first();
        $data['lowongan_kerjas']        = Lowongan_kerja::paginate(10);
        return view('lowongankerja',$data);
    }

}

?>