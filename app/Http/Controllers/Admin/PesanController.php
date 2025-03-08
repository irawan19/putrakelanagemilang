<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Pesan;
use App\Helpers\General;
use Storage;

class PesanController extends AdminCoreController {
    
    public function index(Request $request)
    {
        $data['hasil_kata']         = '';
        $url_sekarang               = $request->fullUrl();
        $data['pesans']             = Pesan::orderBy('created_at', 'desc')->paginate(10);
        session()->forget('hasil_kata');
        session()->forget('halaman');
        session(['halaman'          => $url_sekarang]);
        return view('admin.pesan.lihat',$data);
    }
    
    public function baca($id_pesans)
    {
        $cek = Pesan::where('id_pesans', $id_pesans)->first();
        if(!empty($cek))
        {
            $data['baca_pesans'] = $cek;
            return view('admin.pesan.baca', $data);
        }
        else
            return redirect('dashboard/pesan');
    }

}