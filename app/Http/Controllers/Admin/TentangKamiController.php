<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Tentang_kami;
use App\Helpers\General;
use Storage;

class TentangKamiController extends AdminCoreController {
    
    public function index()
    {
        $data['tentang_kamis']  = Tentang_kami::first();
        session()->forget('halaman');
        return view('admin.tentang_kami.lihat',$data);
    }

    public function prosesedit(Request $request)
    {
        $aturan = [
            'konten_sekilas_tentang_kamis'      => 'required',
            'konten_tentang_kamis'              => 'required',
            'konten_footer_tentang_kamis'       => 'required',
        ];
        $this->validate($request, $aturan);

        $tentang_kami_data = [
            'konten_sekilas_tentang_kamis'      => $request->konten_sekilas_tentang_kamis,
            'konten_tentang_kamis'              => $request->konten_tentang_kamis,
            'konten_footer_tentang_kamis'       => $request->konten_footer_tentang_kamis,
            'updated_at'                        => date('Y-m-d H:i:s'),
        ];
        Tentang_kami::query()->update($tentang_kami_data);

        $setelah_simpan = [
            'alert'                     => 'sukses',
            'text'                      => 'Data tentang kami berhasil diperbarui',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan)->withInput($request->all());

    }

}