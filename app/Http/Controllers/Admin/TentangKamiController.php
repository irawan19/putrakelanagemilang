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
            'userfile_gambar_tentang_kami'            => 'required|mimes:jpg,jpeg,png',
            'konten_sekilas_tentang_kamis'      => 'required',
            'konten_tentang_kamis'              => 'required',
            'konten_footer_tentang_kamis'       => 'required',
        ];
        $this->validate($request, $aturan);

        $nama_gambar_tentang_kami = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_tentang_kami')->getClientOriginalName())));
        $path_gambar_tentang_kami = 'tentang_kami/';
        Storage::disk('public')->put($path_gambar_tentang_kami . $nama_gambar_tentang_kami, file_get_contents($request->file('userfile_gambar_tentang_kami')));

        $tentang_kami_data = [
            'gambar_tentang_kamis'              => $path_gambar_tentang_kami.$nama_gambar_tentang_kami,
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