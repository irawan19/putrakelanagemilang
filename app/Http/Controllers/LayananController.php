<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Aplikasi;
use App\Models\Layanan;
use App\Models\Layanan_detail;

class LayananController extends Controller {
    
    public function index()
    {
        $data['aplikasi']          = Aplikasi::first();
        $data['layanan']           = Layanan::first();
        $data['layanan_details']   = Layanan_detail::get();
        return view('layanan',$data);
    }

}

?>