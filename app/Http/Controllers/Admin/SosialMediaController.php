<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Sosial_media;
use Storage;

class SosialMediaController extends AdminCoreController {

    public function index(Request $request) {
        $data['hasil_kata']         = '';
        $url_sekarang               = $request->fullUrl();
        $data['sosialmedias']       = Sosial_media::orderBy('nama_sosial_medias')->paginate(10);
        session()->forget('hasil_kata');
        session()->forget('halaman');
        session(['halaman'          => $url_sekarang]);
        return view('admin.sosialmedia.lihat',$data);
    }

    public function cari(Request $request) {
        $hasil_kata                 = $request->cari_kata;
        $data['hasil_kata']         = $hasil_kata;
        $url_sekarang               = $request->fullUrl();
        $data['sosialmedias']       = Sosial_media::Where('nama_sosial_medias', 'LIKE', '%'.$hasil_kata.'%')
                                                ->orWhere('url_sosial_medias', 'LIKE', '%'.$hasil_kata.'%')
                                                ->paginate(10);
        session(['hasil_kata'		=> $hasil_kata]);
        session(['halaman'          => $url_sekarang]);
        return view('admin.sosialmedia.lihat', $data);
    }

    public function tambah(Request $request) {
        $data['list_sosial_medias']  = General::sosialMedia();
        return view('admin.sosialmedia.tambah', $data);
    }

    public function prosestambah(Request $request) {
        $aturan = [
            'sosial_medias'                     => 'required',
            'url_sosial_medias'                 => 'required',
        ];
        $this->validate($request, $aturan);

        $ambil_sosial_media = $request->sosial_medias;
        $pisah_sosial_media = explode('_',$ambil_sosial_media);

        $data = [
            'nama_sosial_medias'        => $pisah_sosial_media[1],
            'url_sosial_medias'         => $request->url_sosial_medias,
            'icon_sosial_medias'        => $pisah_sosial_media[0],
            'created_at'                => date('Y-m-d H:i:s'),
        ];

        Sosial_media::insert($data);
        
        if(request()->session()->get('halaman') != '')
            $redirect_halaman  = request()->session()->get('halaman');
        else
            $redirect_halaman  = 'dashboard/sosial-media';

        return redirect($redirect_halaman);
    }

    public function edit(Request $request, $idsosialmedia) {
        $cek_sosial_medias = Sosial_media::find($idsosialmedia);
        if (!empty($cek_sosial_medias)) {
            $data['list_sosial_medias']     = General::sosialMedia();
            $data['sosial_medias']          = Sosial_media::find($idsosialmedia);
            return view('admin.sosialmedia.edit', $data);
        } else {
            return redirect('dashboard/slideshow');
        }
    }

    public function prosesedit(Request $request, $idsosialmedia) {
        $cek_sosial_medias = Sosial_media::find($idsosialmedia);
        if (!empty($cek_sosial_medias)) {
            $aturan = [
                'sosial_medias'                     => 'required',
                'url_sosial_medias'                 => 'required',
            ];
            $this->validate($request, $aturan);

            $ambil_sosial_media = $request->sosial_medias;
            $pisah_sosial_media = explode('_',$ambil_sosial_media);

            $data = [
                'icon_sosial_medias'	=> $pisah_sosial_media[0],
                'nama_sosial_medias'	=> $pisah_sosial_media[1],
                'url_sosial_medias'     => $request->url_sosial_medias,
                'updated_at'            => date('Y-m-d H:i:s')
            ];
            Sosial_media::find($idsosialmedia)->update($data);
            
            if(request()->session()->get('halaman') != '')
                $redirect_halaman  = request()->session()->get('halaman');
            else
                $redirect_halaman  = 'dashboard/sosialmedia';

            return redirect($redirect_halaman);
        } else {
            return redirect('dashboard/slideshow');
        }
    }

    public function hapus($idsosialmedia) {
        try {
            $cek_sosial_medias = Sosial_media::find($idsosialmedia);
            if (!empty($cek_sosial_medias)) {
                $deleted = Sosial_media::where('id_sosial_medias', $idsosialmedia)->delete();
                if ($deleted) {
                    return response()->json(['sukses' => 'sukses'], 200);
                } else {
                    return response()->json(['error' => 'Gagal menghapus data'], 500);
                }
            } else {
                return response()->json(['error' => 'Data tidak ditemukan'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

}