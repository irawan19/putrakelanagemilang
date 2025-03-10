<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Models\Aplikasi;
use App\Models\Slideshow;
use App\Models\PertanyaanUmum;
use App\Models\Testimonial;

class BerandaController extends Controller {
    
    public function index()
    {
        $data['kontak']             = Kontak::first();
        $data['aplikasi']           = Aplikasi::first();
        $data['slideshows']         = Slideshow::orderBy('created_at','desc')->get();
        $data['pertanyaan_umums']   = PertanyaanUmum::orderBy('created_at','asc')->get();
        $data['testimonials']       = Testimonial::orderBy('created_at','desc')->get();
        return view('beranda',$data);
    }

}

?>