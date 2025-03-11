<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Lowongan_kerja;
use Storage;

class LowonganKerjaController extends AdminCoreController {

    public function index(Request $request) {
        $data['hasil_kata']         = '';
        $url_sekarang               = $request->fullUrl();
        $data['lowongankerjas']     = Lowongan_kerja::orderBy('judul_lowongan_kerjas')->paginate(10);
        session()->forget('hasil_kata');
        session()->forget('halaman');
        session(['halaman'          => $url_sekarang]);
        return view('admin.lowongankerja.lihat',$data);
    }

    public function cari(Request $request) {
        $hasil_kata                 = $request->cari_kata;
        $data['hasil_kata']         = $hasil_kata;
        $url_sekarang               = $request->fullUrl();
        $data['lowongankerjas']       = Lowongan_kerja::Where('judul_lowongan_kerjas', 'LIKE', '%'.$hasil_kata.'%')
                                                ->paginate(10);
        session(['hasil_kata'		=> $hasil_kata]);
        session(['halaman'          => $url_sekarang]);
        return view('admin.lowongankerja.lihat', $data);
    }

    public function tambah(Request $request) {
        return view('admin.lowongankerja.tambah');
    }

    public function prosestambah(Request $request) {
        $aturan = [
            'judul_lowongan_kerjas'             => 'required',
            'konten_lowongan_kerjas'            => 'required',
        ];
        $this->validate($request, $aturan);

        $data = [
            'judul_lowongan_kerjas'             => $request->judul_lowongan_kerjas,
            'konten_lowongan_kerjas'            => $request->konten_lowongan_kerjas,
            'created_at'                        => date('Y-m-d H:i:s'),
        ];

        Lowongan_kerja::insert($data);
        
        if(request()->session()->get('halaman') != '')
            $redirect_halaman  = request()->session()->get('halaman');
        else
            $redirect_halaman  = 'dashboard/lowongan-kerja';

        return redirect($redirect_halaman);
    }

    public function edit(Request $request, $idlowongankerja) {
        $cek_lowongan_kerjas = Lowongan_kerja::find($idlowongankerja);
        if (!empty($cek_lowongan_kerjas)) {
            $data['lowongan_kerjas']          = Lowongan_kerja::find($idlowongankerja);
            return view('admin.lowongankerja.edit', $data);
        } else {
            return redirect('dashboard/slideshow');
        }
    }

    public function prosesedit(Request $request, $idlowongankerja) {
        $cek_lowongan_kerjas = Lowongan_kerja::find($idlowongankerja);
        if (!empty($cek_lowongan_kerjas)) {
            $aturan = [
                'judul_lowongan_kerjas'         => 'required',
                'konten_lowongan_kerjas'        => 'required',
            ];
            $this->validate($request, $aturan);

            $data = [
                'judul_lowongan_kerjas'     => $request->judul_lowongan_kerjas,
                'konten_lowongan_kerjas'    => $request->konten_lowongan_kerjas,
                'updated_at'                => date('Y-m-d H:i:s')
            ];
            Lowongan_kerja::find($idlowongankerja)->update($data);
            
            if(request()->session()->get('halaman') != '')
                $redirect_halaman  = request()->session()->get('halaman');
            else
                $redirect_halaman  = 'dashboard/lowongankerja';

            return redirect($redirect_halaman);
        } else {
            return redirect('dashboard/slideshow');
        }
    }

    public function hapus($idlowongankerja) {
        $cek_lowongan_kerjas = Lowongan_kerja::find($idlowongankerja);
        if (!empty($cek_lowongan_kerjas)) {
            Lowongan_kerja::find($idlowongankerja)->delete();
            return response()->json(['sukses' => '"sukses'], 200);
        } else {
            return redirect('dashboard/slideshow');
        }
    }

}