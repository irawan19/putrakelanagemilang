<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Helpers\General;
use Storage;

class GaleriController extends AdminCoreController {

    public function index(Request $request) {
        $data['hasil_kata']         = '';
        $url_sekarang               = $request->fullUrl();
        $data['galeris']            = Galeri::orderBy('id_galeris')->paginate(10);
        session()->forget('hasil_kata');
        session()->forget('halaman');
        session(['halaman'          => $url_sekarang]);
        return view('admin.galeri.lihat',$data);
    }

    public function cari(Request $request) {
        $hasil_kata                 = $request->cari_kata;
        $data['hasil_kata']         = $hasil_kata;
        $url_sekarang               = $request->fullUrl();
        $data['galeris']         = Galeri::Where('judul_galeris', 'LIKE', '%'.$hasil_kata.'%')
                                        ->paginate(10);
        session(['hasil_kata'		=> $hasil_kata]);
        session(['halaman'          => $url_sekarang]);
        return view('admin.galeri.lihat', $data);
    }

    public function tambah(Request $request) {
        return view('admin.galeri.tambah');
    }

    public function prosestambah(Request $request) {
        $aturan = [
            'userfile_foto_galeri' => 'required|mimes:jpg,jpeg,png',
            'judul_galeris'          => 'required',
        ];
        $this->validate($request, $aturan);

        $nama_foto_galeri = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_foto_galeri')->getClientOriginalName())));
        $path_foto_galeri = 'galeri/';
        Storage::disk('public')->put($path_foto_galeri . $nama_foto_galeri, file_get_contents($request->file('userfile_foto_galeri')));

        $data = [
            'foto_galeris' => $path_foto_galeri . $nama_foto_galeri,
            'judul_galeris'  => $request->judul_galeris,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        Galeri::insert($data);
        
        if(request()->session()->get('halaman') != '')
            $redirect_halaman  = request()->session()->get('halaman');
        else
            $redirect_halaman  = 'dashboard/galeri';

        return redirect($redirect_halaman);
    }

    public function edit(Request $request, $idgaleri) {
        $cek_galeris = Galeri::find($idgaleri);
        if (!empty($cek_galeris)) {
            $data['galeris'] = Galeri::find($idgaleri);
            return view('admin.galeri.edit', $data);
        } else {
            return redirect('dashboard/galeri');
        }
    }

    public function prosesedit(Request $request, $idgaleri) {
        $cek_galeris = Galeri::find($idgaleri);
        if (!empty($cek_galeris)) {
            if(!empty($request->userfile_foto_galeri)) {
                $aturan = [
                    'userfile_foto_galeri' => 'required|mimes:jpg,jpeg,png',
                    'judul_galeris' => 'required',
                ];
                $this->validate($request, $aturan);

                $foto_galeri_lama = $cek_galeris->foto_galeris;
                if (Storage::disk('public')->exists($foto_galeri_lama))
                    Storage::disk('public')->delete($foto_galeri_lama);

                $nama_foto_galeri = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_foto_galeri')->getClientOriginalName())));
                $path_foto_galeri = 'galeri/';
                Storage::disk('public')->put($path_foto_galeri . $nama_foto_galeri, file_get_contents($request->file('userfile_foto_galeri')));

                $data = [
                    'foto_galeris' => $path_foto_galeri . $nama_foto_galeri,
                    'judul_galeris'  => $request->judul_galeris,
                    'updated_at'        => date('Y-m-d H:i:s'),
                ];
            } else {
                $aturan = [
                    'judul_galeris' => 'required',
                ];
                $this->validate($request, $aturan);

                $data = [
                    'judul_galeris'  => $request->judul_galeris,
                    'updated_at'        => date('Y-m-d H:i:s'),
                ];
            }
            
            Galeri::find($idgaleri)->update($data);
            
            if(request()->session()->get('halaman') != '')
                $redirect_halaman  = request()->session()->get('halaman');
            else
                $redirect_halaman  = 'dashboard/galeri';

            return redirect($redirect_halaman);
        } else {
            return redirect('dashboard/galeri');
        }
    }

    public function hapus($idgaleri) {
        $cek_galeris = Galeri::find($idgaleri);
        if (!empty($cek_galeris)) {
            Storage::disk('public')->delete($cek_galeris->foto_galeris);
            Galeri::find($idgaleri)->delete();
            return response()->json(['sukses' => '"sukses'], 200);
        } else {
            return redirect('dashboard/galeri');
        }
    }
}