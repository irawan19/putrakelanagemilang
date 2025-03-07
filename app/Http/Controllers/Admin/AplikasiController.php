<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Aplikasi;
use App\Helpers\General;
use Storage;

class AplikasiController extends AdminCoreController {
    
    public function index()
    {
        $data['aplikasis']  = aplikasi::first();
        session()->forget('halaman');
        return view('admin.aplikasi.lihat',$data);
    }

    public function prosesedit(Request $request)
    {
        $aturan = [
            'nama_aplikasis'                => 'required',
            'deskripsi_aplikasis'           => 'required',
            'keyword_aplikasis'            => 'required',
        ];
        $this->validate($request, $aturan);

        $aplikasi_data = [
            'nama_aplikasis'                    => $request->nama_aplikasis,
            'deskripsi_aplikasis'               => $request->deskripsi_aplikasis,
            'keyword_aplikasis'                => $request->keyword_aplikasis,
            'updated_at'                                    => date('Y-m-d H:i:s'),
        ];
        aplikasi::query()->update($aplikasi_data);

        $setelah_simpan = [
            'alert'                     => 'sukses',
            'text'                      => 'Data aplikasi berhasil diperbarui',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan)->withInput($request->all());
    }

    public function proseseditlogo(Request $request)
    {
        $aturan = [
            'userfile_logo'     => 'required|mimes:png,jpg,jpeg,svg',
        ];
        $this->validate($request, $aturan);

        $cek_logo       = aplikasi::first();
        if (!empty($cek_logo)) {
            $logo_lama        = $cek_logo->logo_aplikasis;
            if (Storage::disk('public')->exists($logo_lama))
                Storage::disk('public')->delete($logo_lama);
        }

        $nama_logo = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_logo')->getClientOriginalName())));
        $path_logo = 'logo/';
        Storage::disk('public')->put($path_logo.$nama_logo, file_get_contents($request->file('userfile_logo')));

        $data = [
            'logo_aplikasis'    => $path_logo . $nama_logo,
            'updated_at'                    => date('Y-m-d H:i:s'),
        ];

        aplikasi::query()->update($data);

        $setelah_simpan = [
            'alert'                     => 'sukses',
            'text'                      => 'Logo berhasil diperbarui',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan);
    }

    public function prosesediticon(Request $request)
    {
        $aturan = [
            'userfile_icon'             => 'required|mimes:png,jpg,jpeg,svg',
        ];
        $this->validate($request, $aturan);

        $cek_icon       = aplikasi::first();
        if (!empty($cek_icon)) {
            $icon_lama        = $cek_icon->icon_aplikasis;
            if (Storage::disk('public')->exists($icon_lama))
                Storage::disk('public')->delete($icon_lama);
        }

        $nama_icon = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_icon')->getClientOriginalName())));
        $path_icon = 'logo/';
        Storage::disk('public')->put($path_icon.$nama_icon, file_get_contents($request->file('userfile_icon')));

        $data = [
            'icon_aplikasis'    => $path_icon . $nama_icon,
            'updated_at'                    => date('Y-m-d H:i:s'),
        ];

        aplikasi::query()->update($data);

        $setelah_simpan = [
            'alert'                     => 'sukses',
            'text'                      => 'Icon berhasil diperbarui',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan);
    }

    public function proseseditlogotext(Request $request)
    {
        $aturan = [
            'userfile_logo_text'            => 'required|mimes:png,jpg,jpeg,svg',
        ];
        $this->validate($request, $aturan);

        $cek_logo_text       = aplikasi::first();
        if (!empty($cek_logo_text)) {
            $logo_text_lama        = $cek_logo_text->logo_text_aplikasis;
            if (Storage::disk('public')->exists($logo_text_lama))
                Storage::disk('public')->delete($logo_text_lama);
        }

        $nama_logo_text = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_logo_text')->getClientOriginalName())));
        $path_logo_text = 'logo/';
        Storage::disk('public')->put($path_logo_text.$nama_logo_text, file_get_contents($request->file('userfile_logo_text')));

        $data = [
            'logo_text_aplikasis'   => $path_logo_text . $nama_logo_text,
            'updated_at'                        => date('Y-m-d H:i:s'),
        ];

        aplikasi::query()->update($data);

        $setelah_simpan = [
            'alert'                     => 'sukses',
            'text'                      => 'Logo Text berhasil diperbarui',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan);
    }

}

?>