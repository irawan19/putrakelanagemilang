<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Helpers\General;
use Storage;

class TestimonialController extends AdminCoreController {

    public function index(Request $request) {
        $data['hasil_kata']         = '';
        $url_sekarang               = $request->fullUrl();
        $data['testimonials']         = Testimonial::orderBy('id_testimonials')->paginate(10);
        session()->forget('hasil_kata');
        session()->forget('halaman');
        session(['halaman'          => $url_sekarang]);
        return view('admin.testimonial.lihat',$data);
    }

    public function cari(Request $request) {
        $hasil_kata                 = $request->cari_kata;
        $data['hasil_kata']         = $hasil_kata;
        $url_sekarang               = $request->fullUrl();
        $data['testimonials']       = Testimonial::Where('nama_testimonials', 'LIKE', '%'.$hasil_kata.'%')
                                                ->orWhere('jabatan_testimonials', 'LIKE', '%'.$hasil_kata.'%')
                                                ->paginate(10);
        session(['hasil_kata'		=> $hasil_kata]);
        session(['halaman'          => $url_sekarang]);
        return view('admin.testimonial.lihat', $data);
    }

    public function tambah(Request $request) {
        return view('admin.testimonial.tambah');
    }

    public function prosestambah(Request $request) {
        if(!empty($request->userfile_gambar_testimonials))
        {
            $aturan = [
                'userfile_gambar_testimonial' => 'required|mimes:jpg,jpeg,png',
                'nama_testimonials'          => 'required',
            ];
            $this->validate($request, $aturan);

            $nama_gambar_testimonial = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_testimonial')->getClientOriginalName())));
            $path_gambar_testimonial = 'testimonial/';
            Storage::disk('public')->put($path_gambar_testimonial . $nama_gambar_testimonial, file_get_contents($request->file('userfile_gambar_testimonial')));
        }
        else
        {
            $path_gambar_testimonial   = 'template/front/images/';
            $nama_gambar_testimonial    = 'testimonial.png'; 
        }

        $data = [
            'gambar_testimonials' => $path_gambar_testimonial . $nama_gambar_testimonial,
            'nama_testimonials'  => $request->nama_testimonials,
            'jabatan_testimonials'  => $request->jabatan_testimonials,
            'konten_testimonials'  => $request->konten_testimonials,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        Testimonial::insert($data);
        
        if(request()->session()->get('halaman') != '')
            $redirect_halaman  = request()->session()->get('halaman');
        else
            $redirect_halaman  = 'dashboard/testimonial';

        return redirect($redirect_halaman);
    }

    public function edit(Request $request, $idtestimonial) {
        $cek_testimonials = Testimonial::find($idtestimonial);
        if (!empty($cek_testimonials)) {
            $data['testimonials'] = Testimonial::find($idtestimonial);
            return view('admin.testimonial.edit', $data);
        } else {
            return redirect('dashboard/testimonial');
        }
    }

    public function prosesedit(Request $request, $idtestimonial) {
        $cek_testimonials = Testimonial::find($idtestimonial);
        if (!empty($cek_testimonials)) {
            if(!empty($request->userfile_gambar_testimonial)) {
                $aturan = [
                    'userfile_gambar_testimonial' => 'required|mimes:jpg,jpeg,png',
                    'nama_testimonials' => 'required',
                ];
                $this->validate($request, $aturan);

                $gambar_testimonial_lama = $cek_testimonials->gambar_testimonials;
                if (Storage::disk('public')->exists($gambar_testimonial_lama))
                    Storage::disk('public')->delete($gambar_testimonial_lama);

                $nama_gambar_testimonial = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_testimonial')->getClientOriginalName())));
                $path_gambar_testimonial = 'testimonial/';
                Storage::disk('public')->put($path_gambar_testimonial . $nama_gambar_testimonial, file_get_contents($request->file('userfile_gambar_testimonial')));

                $data = [
                    'gambar_testimonials' => $path_gambar_testimonial . $nama_gambar_testimonial,
                    'nama_testimonials'  => $request->nama_testimonials,
                    'jabatan_testimonials'  => $request->jabatan_testimonials,
                    'konten_testimonials'  => $request->jabatan_testimonials,
                    'updated_at'        => date('Y-m-d H:i:s'),
                ];
            } else {
                $aturan = [
                    'nama_testimonials' => 'required',
                ];
                $this->validate($request, $aturan);

                $data = [
                    'nama_testimonials'  => $request->nama_testimonials,
                    'jabatan_testimonials'  => $request->jabatan_testimonials,
                    'konten_testimonials'  => $request->konten_testimonials,
                    'updated_at'        => date('Y-m-d H:i:s'),
                ];
            }
            
            Testimonial::find($idtestimonial)->update($data);
            
            if(request()->session()->get('halaman') != '')
                $redirect_halaman  = request()->session()->get('halaman');
            else
                $redirect_halaman  = 'dashboard/testimonial';

            return redirect($redirect_halaman);
        } else {
            return redirect('dashboard/testimonial');
        }
    }

    public function hapus($idtestimonial) {
        $cek_testimonials = Testimonial::find($idtestimonial);
        if (!empty($cek_testimonials)) {
            if($cek_testimonials->gambar_testimonials != 'template/front/images/testimonial.png')
            Storage::disk('public')->delete($cek_testimonials->gambar_testimonials);
            Testimonial::find($idtestimonial)->delete();
            return response()->json(['sukses' => '"sukses'], 200);
        } else {
            return redirect('dashboard/testimonial');
        }
    }
}