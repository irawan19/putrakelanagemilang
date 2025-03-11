<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Aplikasi;
use App\Models\Tentang_kami;
use App\Models\Tentang_kami_detail;

class TentangKamiController extends Controller {
    
    public function index()
    {
        $data['aplikasi']               = Aplikasi::first();
        $data['tentang_kami']           = Tentang_kami::first();
        $data['tentang_kami_details']   = Tentang_kami_detail::get();
        return view('tentangkami',$data);
    }

}

?>