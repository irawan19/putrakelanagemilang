<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Aplikasi;
use App\Models\Kontak;
use App\Models\Pesan;
use ValidateRequests;

class KontakController extends Controller {
    
    public function index()
    {
        $data['aplikasi']           = Aplikasi::first();
        $data['kontak']             = Kontak::first();
        return view('kontak',$data);
    }

    public function kirim(Request $request)
    {
        $aturan = [
            'nama_pesans'               => 'required',
            'telepon_pesans'            => 'required',
            'email_pesans'              => 'required',
            'konten_pesans'             => 'required',
        ];
        $this->validate($request, $aturan);

        $data = [
            'nama_pesans'           => $request->nama_pesans,
            'telepon_pesans'        => $request->telepon_pesans,
            'email_pesans'          => $request->email_pesans,
            'konten_pesans'         => $request->konten_pesans,
            'status_baca_pesans'    => false,
            'created_at'         	=> date('Y-m-d H:i:s'),
        ];
        Pesan::insert($data);

        return redirect('kontak');
    }

}

?>