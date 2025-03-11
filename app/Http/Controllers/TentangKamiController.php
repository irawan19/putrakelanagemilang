<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Aplikasi;
use App\Models\Tentang_kami;
use App\Models\Layanan;
use App\Models\Layanan_detail;
use App\Models\Tentang_kami_detail;
use App\Models\PertanyaanUmum;
use App\Models\Testimonial;

class TentangKamiController extends Controller {
    
    public function index()
    {
        $data['aplikasi']               = Aplikasi::first();
        $data['tentang_kami']           = Tentang_kami::first();
        $data['tentang_kami_details']   = Tentang_kami_detail::get();
        $data['layanan']                = Layanan::first();
        $data['layanan_details']        = Layanan_detail::get();
        $data['pertanyaan_umums']       = PertanyaanUmum::orderBy('created_at','asc')->get();
        $data['testimonials']           = Testimonial::orderBy('created_at','desc')->get();
        return view('tentangkami',$data);
    }

}

?>