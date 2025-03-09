<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Slideshow;
use App\Helpers\General;
use Storage;

class SlideshowController extends AdminCoreController {

    public function index(Request $request) {
        $data['hasil_kata']         = '';
        $url_sekarang               = $request->fullUrl();
        $data['slideshows']         = Slideshow::orderBy('id_slideshows')->paginate(10);
        session()->forget('hasil_kata');
        session()->forget('halaman');
        session(['halaman'          => $url_sekarang]);
        return view('admin.slideshow.lihat',$data);
    }

    public function cari(Request $request) {
        $hasil_kata                 = $request->cari_kata;
        $data['hasil_kata']         = $hasil_kata;
        $url_sekarang               = $request->fullUrl();
        $data['slideshows']         = Slideshow::Where('text1_slideshows', 'LIKE', '%'.$hasil_kata.'%')
                                        ->orWhere('text2_slideshows', 'LIKE', '%'.$hasil_kata.'%')
                                        ->paginate(10);
        session(['hasil_kata'		=> $hasil_kata]);
        session(['halaman'          => $url_sekarang]);
        return view('admin.slideshow.lihat', $data);
    }

    public function tambah(Request $request) {
        return view('admin.slideshow.tambah');
    }

    public function prosestambah(Request $request) {
        $aturan = [
            'userfile_gambar_slideshow' => 'required|mimes:jpg,jpeg,png',
            'text1_slideshows'          => 'required',
            'text2_slideshows'          => 'required',
        ];
        $this->validate($request, $aturan);

        $nama_gambar_slideshow = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_slideshow')->getClientOriginalName())));
        $path_gambar_slideshow = 'slideshow/';
        Storage::disk('public')->put($path_gambar_slideshow . $nama_gambar_slideshow, file_get_contents($request->file('userfile_gambar_slideshow')));

        $data = [
            'gambar_slideshows' => $path_gambar_slideshow . $nama_gambar_slideshow,
            'text1_slideshows'  => $request->text1_slideshows,
            'text2_slideshows'  => $request->text2_slideshows,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        Slideshow::insert($data);
        
        if(request()->session()->get('halaman') != '')
            $redirect_halaman  = request()->session()->get('halaman');
        else
            $redirect_halaman  = 'dashboard/slideshow';

        return redirect($redirect_halaman);
    }

    public function edit(Request $request, $idslideshow) {
        $cek_slideshows = Slideshow::find($idslideshow);
        if (!empty($cek_slideshows)) {
            $data['slideshows'] = Slideshow::find($idslideshow);
            return view('admin.slideshow.edit', $data);
        } else {
            return redirect('dashboard/slideshow');
        }
    }

    public function prosesedit(Request $request, $idslideshow) {
        $cek_slideshows = Slideshow::find($idslideshow);
        if (!empty($cek_slideshows)) {
            if(!empty($request->userfile_gambar_slideshow)) {
                $aturan = [
                    'userfile_gambar_slideshow' => 'required|mimes:jpg,jpeg,png',
                    'text1_slideshows' => 'required',
                    'text2_slideshows' => 'required',
                ];
                $this->validate($request, $aturan);

                $gambar_slideshow_lama = $cek_slideshows->gambar_slideshows;
                if (Storage::disk('public')->exists($gambar_slideshow_lama))
                    Storage::disk('public')->delete($gambar_slideshow_lama);

                $nama_gambar_slideshow = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_slideshow')->getClientOriginalName())));
                $path_gambar_slideshow = 'slideshow/';
                Storage::disk('public')->put($path_gambar_slideshow . $nama_gambar_slideshow, file_get_contents($request->file('userfile_gambar_slideshow')));

                $data = [
                    'gambar_slideshows' => $path_gambar_slideshow . $nama_gambar_slideshow,
                    'text1_slideshows' => $request->text1_slideshows,
                    'text2_slideshows' => $request->text1_slideshows,
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            } else {
                $aturan = [
                    'text1_slideshows' => 'required',
                    'text2_slideshows' => 'required',
                ];
                $this->validate($request, $aturan);

                $data = [
                    'text1_slideshows' => $request->text1_slideshows,
                    'text2_slideshows' => $request->text1_slideshows,
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }
            
            Slideshow::find($idslideshow)->update($data);
            
            if(request()->session()->get('halaman') != '')
                $redirect_halaman  = request()->session()->get('halaman');
            else
                $redirect_halaman  = 'dashboard/slideshow';

            return redirect($redirect_halaman);
        } else {
            return redirect('dashboard/slideshow');
        }
    }

    public function hapus($idslideshow) {
        $cek_slideshows = Slideshow::find($idslideshow);
        if (!empty($cek_slideshows)) {
            Storage::disk('public')->delete($cek_slideshows->gambar_slideshows);
            Slideshow::find($idslideshow)->delete();
            return response()->json(['sukses' => '"sukses'], 200);
        } else {
            return redirect('dashboard/slideshow');
        }
    }
}