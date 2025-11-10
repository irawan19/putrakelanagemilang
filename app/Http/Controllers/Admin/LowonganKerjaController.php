<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Aplikasi;
use App\Models\Lowongan_kerja;
use App\Models\Pelamar_lowongan_kerja;
use Storage;

class LowonganKerjaController extends AdminCoreController {

    public function index(Request $request) {
        $data['hasil_kata']         = '';
        $url_sekarang               = $request->fullUrl();
        $data['aplikasi']           = Aplikasi::first();
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
        $data['aplikasi']           = Aplikasi::first();
        $data['lowongankerjas']     = Lowongan_kerja::Where('judul_lowongan_kerjas', 'LIKE', '%'.$hasil_kata.'%')
                                                ->paginate(10);
        session(['hasil_kata'		=> $hasil_kata]);
        session(['halaman'          => $url_sekarang]);
        return view('admin.lowongankerja.lihat', $data);
    }

    public function tambah(Request $request) {
        return view('admin.lowongankerja.tambah');
    }

    public function prosestambah(Request $request) {
        if(!empty($request->userfile_gambar_lowongan_kerja))
        {
            $aturan = [
                'judul_lowongan_kerjas'             => 'required',
                'sekilas_konten_lowongan_kerjas'    => 'required',
                'konten_lowongan_kerjas'            => 'required',
            ];
            $this->validate($request, $aturan);

            $nama_gambar_lowongan_kerja = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_lowongan_kerja')->getClientOriginalName())));
            $path_gambar_lowongan_kerja = 'lowongan_kerja/';
            Storage::disk('public')->put($path_gambar_lowongan_kerja . $nama_gambar_lowongan_kerja, file_get_contents($request->file('userfile_gambar_lowongan_kerja')));

            $data = [
                'gambar_lowongan_kerjas'            => $path_gambar_lowongan_kerja . $nama_gambar_lowongan_kerja,
                'judul_lowongan_kerjas'             => $request->judul_lowongan_kerjas,
                'slug_lowongan_kerjas'              => str_slug(date('YmdHis').'_'.$request->judul_lowongan_kerjas),
                'sekilas_konten_lowongan_kerjas'    => $request->sekilas_konten_lowongan_kerjas,
                'konten_lowongan_kerjas'            => $request->konten_lowongan_kerjas,
                'created_at'                        => date('Y-m-d H:i:s'),
            ];
        }
        else
        {
            $aturan = [
                'judul_lowongan_kerjas'             => 'required',
                'sekilas_konten_lowongan_kerjas'    => 'required',
                'konten_lowongan_kerjas'            => 'required',
            ];
            $this->validate($request, $aturan);

            $data = [
                'judul_lowongan_kerjas'             => $request->judul_lowongan_kerjas,
                'slug_lowongan_kerjas'              => str_slug(date('YmdHis').'_'.$request->judul_lowongan_kerjas),
                'sekilas_konten_lowongan_kerjas'    => $request->sekilas_konten_lowongan_kerjas,
                'konten_lowongan_kerjas'            => $request->konten_lowongan_kerjas,
                'created_at'                        => date('Y-m-d H:i:s'),
            ];
        }

        Lowongan_kerja::insert($data);
        
        if(request()->session()->get('halaman') != '')
            $redirect_halaman  = request()->session()->get('halaman');
        else
            $redirect_halaman  = 'dashboard/lowongan-kerja';

        return redirect($redirect_halaman);
    }

    public function baca(Request $request, $idlowongankerja)
    {
        $cek_lowongan_kerjas = Lowongan_kerja::find($idlowongankerja);
        if (!empty($cek_lowongan_kerjas)) {
            $data['lowongan_kerjas']            = $cek_lowongan_kerjas;
            $data['aplikasi']                   = Aplikasi::first();
            $data['pelamar_lowongan_kerjas']    = Pelamar_lowongan_kerja::orderBy('created_at','asc')
                                                                        ->paginate(10);
            return view('admin.lowongankerja.baca',$data);
        } else {
            return redirect('dashboard/lowongan_kerja');
        }
    }

    public function edit(Request $request, $idlowongankerja) {
        $cek_lowongan_kerjas = Lowongan_kerja::find($idlowongankerja);
        if (!empty($cek_lowongan_kerjas)) {
            $data['lowongan_kerjas']        = Lowongan_kerja::find($idlowongankerja);
            $data['aplikasi']               = Aplikasi::first();
            return view('admin.lowongankerja.edit', $data);
        } else {
            return redirect('dashboard/lowongan_kerja');
        }
    }

    public function prosesedit(Request $request, $idlowongankerja) {
        $cek_lowongan_kerjas = Lowongan_kerja::find($idlowongankerja);
        if (!empty($cek_lowongan_kerjas)) {
            if (!empty($request->userfile_gambar_lowongan_kerja))
            {
                $aturan = [
                    'judul_lowongan_kerjas'         => 'required',
                    'sekilas_konten_lowongan_kerjas'=> 'required',
                    'konten_lowongan_kerjas'        => 'required',
                ];
                $this->validate($request, $aturan);

                $gambar_lowongan_kerja_lama = $cek_lowongan_kerjas->gambar_lowongan_kerjas;
                if (Storage::disk('public')->exists($gambar_lowongan_kerja_lama))
                    Storage::disk('public')->delete($gambar_lowongan_kerja_lama);

                $nama_gambar_lowongan_kerja = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_lowongan_kerja')->getClientOriginalName())));
                $path_gambar_lowongan_kerja = 'lowongan_kerja/';
                Storage::disk('public')->put($path_gambar_lowongan_kerja . $nama_gambar_lowongan_kerja, file_get_contents($request->file('userfile_gambar_lowongan_kerja')));

                $data = [
                    'gambar_lowongan_kerjas'        => $path_gambar_lowongan_kerja.$nama_gambar_lowongan_kerja,
                    'judul_lowongan_kerjas'         => $request->judul_lowongan_kerjas,
                    'slug_lowongan_kerjas'          => str_slug(date('YmdHis').'_'.$request->judul_lowongan_kerjas),
                    'sekilas_konten_lowongan_kerjas'=> $request->sekilas_konten_lowongan_kerjas,
                    'konten_lowongan_kerjas'        => $request->konten_lowongan_kerjas,
                    'updated_at'                    => date('Y-m-d H:i:s')
                ];
            }
            else
            {
                $aturan = [
                    'judul_lowongan_kerjas'         => 'required',
                    'sekilas_konten_lowongan_kerjas'=> 'required',
                    'konten_lowongan_kerjas'        => 'required',
                ];
                $this->validate($request, $aturan);

                $data = [
                    'judul_lowongan_kerjas'         => $request->judul_lowongan_kerjas,
                    'slug_lowongan_kerjas'          => str_slug(date('YmdHis').'_'.$request->judul_lowongan_kerjas),
                    'sekilas_konten_lowongan_kerjas'=> $request->sekilas_konten_lowongan_kerjas,
                    'konten_lowongan_kerjas'        => $request->konten_lowongan_kerjas,
                    'updated_at'                    => date('Y-m-d H:i:s')
                ];
            }
            Lowongan_kerja::find($idlowongankerja)->update($data);
            
            if(request()->session()->get('halaman') != '')
                $redirect_halaman  = request()->session()->get('halaman');
            else
                $redirect_halaman  = 'dashboard/lowongankerja';

            return redirect($redirect_halaman);
        } else {
            return redirect('dashboard/lowongan_kerja');
        }
    }

    public function hapus($idlowongankerja) {
        try {
            $cek_lowongan_kerjas = Lowongan_kerja::find($idlowongankerja);
            if (!empty($cek_lowongan_kerjas)) {
                // Hapus semua data pelamar yang terkait dengan lowongan kerja ini
                $pelamar_lowongan_kerjas = Pelamar_lowongan_kerja::where('lowongan_kerjas_id', $idlowongankerja)->get();
                foreach ($pelamar_lowongan_kerjas as $pelamar) {
                    // Hapus file CV jika ada
                    if (!empty($pelamar->cv_pelamar_lowongan_kerjas) && Storage::disk('public')->exists($pelamar->cv_pelamar_lowongan_kerjas)) {
                        Storage::disk('public')->delete($pelamar->cv_pelamar_lowongan_kerjas);
                    }
                    // Hapus data pelamar
                    Pelamar_lowongan_kerja::where('id_pelamar_lowongan_kerjas', $pelamar->id_pelamar_lowongan_kerjas)->delete();
                }
                
                // Hapus gambar lowongan kerja jika ada
                if (!empty($cek_lowongan_kerjas->gambar_lowongan_kerjas) && Storage::disk('public')->exists($cek_lowongan_kerjas->gambar_lowongan_kerjas)) {
                    Storage::disk('public')->delete($cek_lowongan_kerjas->gambar_lowongan_kerjas);
                }
                
                // Hapus data lowongan kerja
                $deleted = Lowongan_kerja::where('id_lowongan_kerjas', $idlowongankerja)->delete();
                
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