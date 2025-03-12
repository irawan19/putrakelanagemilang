<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Aplikasi;
use App\Models\Kontak;

class KontakController extends Controller {
    
    public function index()
    {
        $data['aplikasi']          = Aplikasi::first();
        $data['layanan']           = Kontak::first();
        return view('layanan',$data);
    }

}

?>