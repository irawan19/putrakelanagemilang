<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Helpers\General;
use Storage;

class KatalogController extends AdminCoreController {
    
    public function index()
    {
        $data['hasil_kata_merk']    = '';
        session()->forget('halaman');
        return view('admin.katalog.lihat',$data);
    }

}