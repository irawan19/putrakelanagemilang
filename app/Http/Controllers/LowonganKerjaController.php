<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Aplikasi;
use App\Models\Lowongan_kerja;
use App\Models\Pelamar_lowongan_kerja;
use Storage;

class LowonganKerjaController extends Controller {
    
    public function index()
    {
        $data['aplikasi']               = Aplikasi::first();
        $data['lowongan_kerjas']        = Lowongan_kerja::paginate(10);
        return view('lowongankerja',$data);
    }

    public function detail(Request $request, $slug)
    {
        $cek_lowongan_kerja = Lowongan_kerja::where('slug_lowongan_kerjas', $slug)->first();
        if(!empty($cek_lowongan_kerja))
        {
            $data['lowongan_kerja'] = $cek_lowongan_kerja;
            $data['aplikasi']       = Aplikasi::first();
            return view('lowongankerjadetail',$data);
        } else {
            return redirect('/lowongan-kerja');
        }
    }

    public function kirim(Request $request, $slug_lowongan_kerjas)
    {
        $cek_lowongan_kerjas = Lowongan_kerja::where('slug_lowongan_kerjas',$slug_lowongan_kerjas)->first();
        if(!empty($cek_lowongan_kerjas))
        {
            $aturan = [
                'nama_lengkap_pelamar_lowongan_kerjas'  => 'required',
                'telepon_pelamar_lowongan_kerjas'       => 'required',
                'email_pelamar_lowongan_kerjas'         => 'required',
                'userfile_cv_pelamar_lowongan_kerjas'   => 'required',
            ];
            $this->validate($request, $aturan);
            
            $nama_cv_pelamar_lowongan_kerja = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_cv_pelamar_lowongan_kerjas')->getClientOriginalName())));
            $path_cv_pelamar_lowongan_kerja = 'pelamar_lowongan_kerja/';
            Storage::disk('public')->put($path_cv_pelamar_lowongan_kerja . $nama_cv_pelamar_lowongan_kerja, file_get_contents($request->file('userfile_cv_pelamar_lowongan_kerjas')));
    
            $data = [
                'lowongan_kerjas_id'                    => $cek_lowongan_kerjas->id_lowongan_kerjas,
                'cv_pelamar_lowongan_kerjas'            => $path_cv_pelamar_lowongan_kerja . $nama_cv_pelamar_lowongan_kerja,
                'nama_lengkap_pelamar_lowongan_kerjas'  => $request->nama_lengkap_pelamar_lowongan_kerjas,
                'telepon_pelamar_lowongan_kerjas'       => $request->telepon_pelamar_lowongan_kerjas,
                'email_pelamar_lowongan_kerjas'         => $request->email_pelamar_lowongan_kerjas,
                'created_at'                            => date('Y-m-d H:i:s'),
            ];
    
            Pelamar_lowongan_kerja::insert($data);

            return redirect('lowongan-kerja/detail/'.$slug_lowongan_kerjas);
        }
        else
        {
            return redirect('lowongan-kerja');
        }
    }

}

?>