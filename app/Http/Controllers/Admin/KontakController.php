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
        if(!empty($request->userfile_gambar_kontak))
        {
            $aturan = [
                'userfile_gambar_kontak'    => 'required|mimes:jpg,jpeg,png',
                'text1_kontaks'             => 'required',
                'text2_kontaks'             => 'required',
                'telepon_kontaks'           => 'required',
                'email_kontaks'             => 'required',
                'alamat_kontaks'            => 'required',
                'url_alamat_kontaks'        => 'required',
            ];
            $this->validate($request, $aturan);

            $nama_gambar_kontak = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_kontak')->getClientOriginalName())));
            $path_gambar_kontak = 'kontak/';
            Storage::disk('public')->put($path_gambar_kontak . $nama_gambar_kontak, file_get_contents($request->file('userfile_gambar_kontak')));

            $kontak_data = [
                'text1_kontaks'             => $request->text1_kontaks,
                'text2_kontaks'             => $request->text2_kontaks,
                'gambar_kontaks'            => $path_gambar_kontak.$nama_gambar_kontak,
                'telepon_kontaks'           => $request->telepon_kontaks,
                'email_kontaks'             => $request->email_kontaks,
                'alamat_kontaks'            => $request->alamat_kontaks,
                'url_alamat_kontaks'        => $request->url_alamat_kontaks,
                'updated_at'                => date('Y-m-d H:i:s'),
            ];
        }
        else
        {
            $aturan = [
                'text1_kontaks'             => 'required',
                'text2_kontaks'             => 'required',
                'telepon_kontaks'           => 'required',
                'email_kontaks'             => 'required',
                'alamat_kontaks'            => 'required',
                'url_alamat_kontaks'        => 'required',
            ];
            $this->validate($request, $aturan);

            $kontak_data = [
                'text1_kontaks'             => $request->text1_kontaks,
                'text2_kontaks'             => $request->text2_kontaks,
                'telepon_kontaks'           => $request->telepon_kontaks,
                'email_kontaks'             => $request->email_kontaks,
                'alamat_kontaks'            => $request->alamat_kontaks,
                'url_alamat_kontaks'        => $request->url_alamat_kontaks,
                'updated_at'                => date('Y-m-d H:i:s'),
            ];
        }
        Kontak::query()->update($kontak_data);

        $setelah_simpan = [
            'alert'                     => 'sukses',
            'text'                      => 'Data kontak berhasil diperbarui',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan)->withInput($request->all());

    }

}