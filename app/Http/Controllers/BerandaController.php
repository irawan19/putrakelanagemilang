<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Models\Aplikasi;
use App\Models\Slideshow;
use App\Models\Tentang_kami;
use App\Models\Layanan;
use App\Models\Layanan_detail;
use App\Models\Tentang_kami_detail;
use App\Models\PertanyaanUmum;
use App\Models\Testimonial;
use GuzzleHttp\Client;

class BerandaController extends Controller {
    
    public function index()
    {
        $data['kontak']                 = Kontak::first();
        $data['aplikasi']               = Aplikasi::first();
        $data['slideshows']             = Slideshow::orderBy('created_at','desc')->get();
        $data['tentang_kami']           = Tentang_kami::first();
        $data['tentang_kami_details']   = Tentang_kami_detail::get();
        $data['layanan']                = Layanan::first();
        $data['layanan_details']        = Layanan_detail::get();
        $data['pertanyaan_umums']       = PertanyaanUmum::orderBy('created_at','asc')->get();
        $api_katalog                = new Client(['http_errors' => false]);
        $response                   = $api_katalog->request(
            "GET",
            "https://penawaran.putrakelanagemilang.com/api/barang/5",
            [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                ]
            ]
        );
        if($response->getStatusCode() == 200) {
            $data['katalogs']          = json_decode($response->getBody());
        } else {
            $data['katalogs']          =  array();
        }
        $data['testimonials']           = Testimonial::orderBy('created_at','desc')->get();
        return view('beranda',$data);
    }

}

?>