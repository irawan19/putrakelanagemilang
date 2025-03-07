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
        $aturan = [
            'telepon_kontaks'           => 'required',
            'email_kontaks'             => 'required',
            'alamat_kontaks'            => 'required',
            'lat_alamat_kontaks'        => 'required',
            'long_alamat_kontaks'       => 'required',
        ];
        $this->validate($request, $aturan);

        $kontak_data = [
            'telepon_kontaks'           => $request->telepon_kontaks,
            'email_kontaks'             => $request->email_kontaks,
            'alamat_kontaks'            => $request->alamat_kontaks,
            'lat_alamat_kontaks'        => $request->lat_alamat_kontaks,
            'long_alamat_kontaks'       => $request->long_alamat_kontaks,
            'updated_at'                => date('Y-m-d H:i:s'),
        ];
        Kontak::query()->update($kontak_data);

        $setelah_simpan = [
            'alert'                     => 'sukses',
            'text'                      => 'Data kontak berhasil diperbarui',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan)->withInput($request->all());

    }

}