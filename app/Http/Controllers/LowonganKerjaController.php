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

    public function detail(Request $request, $slug)
    {
        $cek_lowongan_kerja = Lowongan_kerja::where('slug_lowongan_kerjas', $slug)->first();
        if(!empty($cek_lowongan_kerja))
        {
            $data['lowongan_kerja'] = $cek_lowongan_kerja;
            $data['aplikasi']       = Aplikasi::first();
            return view('lowongankerjadetail',$data);
        } else {
            return redirect('/lowongan-kerja');
        }
    }

    public function kirim(Request $request)
    {

    }

}

?>