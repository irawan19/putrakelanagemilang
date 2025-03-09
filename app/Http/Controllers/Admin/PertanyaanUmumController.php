<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\PertanyaanUmum;
use App\Helpers\General;

class PertanyaanUmumController extends AdminCoreController {

    public function index(Request $request) {
        $data['hasil_kata']         = '';
        $url_sekarang               = $request->fullUrl();
        $data['pertanyaan_umums']         = PertanyaanUmum::orderBy('id_pertanyaan_umums')->paginate(10);
        session()->forget('hasil_kata');
        session()->forget('halaman');
        session(['halaman'          => $url_sekarang]);
        return view('admin.pertanyaan_umum.lihat',$data);
    }

    public function cari(Request $request) {
        $hasil_kata                 = $request->cari_kata;
        $data['hasil_kata']         = $hasil_kata;
        $url_sekarang               = $request->fullUrl();
        $data['pertanyaan_umums']         = PertanyaanUmum::Where('pertanyaan_pertanyaan_umums', 'LIKE', '%'.$hasil_kata.'%')
                                                            ->orWhere('jawaban_pertanyaaan_umums', 'LIKE', '%'.$hasil_kata.'%')
                                                            ->paginate(10);
        session(['hasil_kata'		=> $hasil_kata]);
        session(['halaman'          => $url_sekarang]);
        return view('admin.pertanyaan_umum.lihat', $data);
    }

    public function tambah(Request $request) {
        return view('admin.pertanyaan_umum.tambah');
    }

    public function prosestambah(Request $request) {
        $aturan = [
            'pertanyaan_pertanyaan_umums' => 'required',
            'jawaban_pertanyaan_umums' => 'required',
        ];
        $this->validate($request, $aturan);

        $data = [
            'pertanyaan_pertanyaan_umums'  => $request->pertanyaan_pertanyaan_umums,
            'jawaban_pertanyaan_umums'  => $request->jawaban_pertanyaan_umums,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        PertanyaanUmum::insert($data);
        
        if(request()->session()->get('halaman') != '')
            $redirect_halaman  = request()->session()->get('halaman');
        else
            $redirect_halaman  = 'dashboard/pertanyaan-umum';

        return redirect($redirect_halaman);
    }

    public function edit(Request $request, $id_pertanyaan_umum) {
        $cek_pertanyaan_umums = PertanyaanUmum::find($id_pertanyaan_umum);
        if (!empty($cek_pertanyaan_umums)) {
            $data['pertanyaan_umums'] = PertanyaanUmum::find($id_pertanyaan_umum);
            return view('admin.pertanyaan_umum.edit', $data);
        } else {
            return redirect('dashboard/pertanyaan-umum');
        }
    }

    public function prosesedit(Request $request, $id_pertanyaan_umum) {
        $cek_pertanyaan_umums = PertanyaanUmum::find($id_pertanyaan_umum);
        if (!empty($cek_pertanyaan_umums)) {
            $aturan = [
                'pertanyaan_pertanyaan_umums' => 'required',
                'jawaban_pertanyaan_umums' => 'required',
            ];
            $this->validate($request, $aturan);

            $data = [
                'pertanyaan_pertanyaan_umums'  => $request->pertanyaan_pertanyaan_umums,
                'jawaban_pertanyaan_umums'  => $request->jawaban_pertanyaan_umums,
                'updated_at'        => date('Y-m-d H:i:s'),
            ];
            
            PertanyaanUmum::find($id_pertanyaan_umum)->update($data);
            
            if(request()->session()->get('halaman') != '')
                $redirect_halaman  = request()->session()->get('halaman');
            else
                $redirect_halaman  = 'dashboard/pertanyaan-umum';

            return redirect($redirect_halaman);
        } else {
            return redirect('dashboard/pertanyaan-umum');
        }
    }

    public function hapus($id_pertanyaan_umum) {
        $cek_pertanyaan_umums = PertanyaanUmum::find($id_pertanyaan_umum);
        if (!empty($cek_pertanyaan_umums)) {
            PertanyaanUmum::find($id_pertanyaan_umum)->delete();
            return response()->json(['sukses' => '"sukses'], 200);
        } else {
            return redirect('dashboard/pertanyaan-umum');
        }
    }
}