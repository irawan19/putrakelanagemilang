<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Helpers\General;
use Storage;

class LayananController extends AdminCoreController {
    
    public function index()
    {
        $data['layanans']  = Layanan::first();
        session()->forget('halaman');
        return view('admin.layanan.lihat',$data);
    }

    public function prosesedit(Request $request)
    {
        $aturan = [
            'text_layanans'        => 'required',
        ];
        $this->validate($request, $aturan);

        $layanan_data = [
            'text_layanans'        => $request->text_layanans,
            'updated_at'            => date('Y-m-d H:i:s'),
        ];
        Layanan::query()->update($layanan_data);

        $setelah_simpan = [
            'alert'                     => 'sukses',
            'text'                      => 'Data layanan berhasil diperbarui',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan)->withInput($request->all());

    }

}