<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Helpers\General;
use Storage;

class KontakController extends AdminCoreController {
    
    public function index()
    {
        $data['kontaks']  = Kontak::first();
        session()->forget('halaman');
        return view('admin.kontak.lihat',$data);
    }

    public function prosesedit(Request $request)
    {
        
    }

}