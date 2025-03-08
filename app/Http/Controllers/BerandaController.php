<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Models\Aplikasi;

class BerandaController extends Controller {
    
    public function index()
    {
        $data['kontak']     = Kontak::first();
        $data['aplikasi']   = Aplikasi::first();
        return view('beranda',$data);
    }

}

?>