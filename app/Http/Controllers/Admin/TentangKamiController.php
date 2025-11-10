<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Tentang_kami;
use App\Models\Tentang_kami_detail;
use App\Helpers\General;
use Storage;

class TentangKamiController extends AdminCoreController {
    
    public function index()
    {
        $data['tentang_kamis']          = Tentang_kami::first();
        $data['tentang_kami_details']   = Tentang_kami_detail::get();
        session()->forget('halaman');
        return view('admin.tentang_kami.lihat',$data);
    }

    public function prosesedit(Request $request)
    {
        if(!empty($request->userfile_gambar_tentang_kami))
        {
            $aturan = [
                'userfile_gambar_tentang_kami'      => 'required|mimes:jpg,jpeg,png',
                'text1_tentang_kamis'               => 'required',
                'text2_tentang_kamis'               => 'required',
                'konten_sekilas_tentang_kamis'      => 'required',
                'konten_tentang_kamis'              => 'required',
                'konten_footer_tentang_kamis'       => 'required',
            ];
            $this->validate($request, $aturan);

            $nama_gambar_tentang_kami = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_tentang_kami')->getClientOriginalName())));
            $path_gambar_tentang_kami = 'tentang_kami/';
            Storage::disk('public')->put($path_gambar_tentang_kami . $nama_gambar_tentang_kami, file_get_contents($request->file('userfile_gambar_tentang_kami')));

            $tentang_kami_data = [
                'text1_tentang_kamis'               => $request->text1_tentang_kamis,
                'text2_tentang_kamis'               => $request->text2_tentang_kamis,
                'gambar_tentang_kamis'              => $path_gambar_tentang_kami.$nama_gambar_tentang_kami,
                'konten_sekilas_tentang_kamis'      => $request->konten_sekilas_tentang_kamis,
                'konten_tentang_kamis'              => $request->konten_tentang_kamis,
                'konten_footer_tentang_kamis'       => $request->konten_footer_tentang_kamis,
                'updated_at'                        => date('Y-m-d H:i:s'),
            ];
        }
        else
        {
            $aturan = [
                'text1_tentang_kamis'               => 'required',
                'text2_tentang_kamis'               => 'required',
                'konten_sekilas_tentang_kamis'      => 'required',
                'konten_tentang_kamis'              => 'required',
                'konten_footer_tentang_kamis'       => 'required',
            ];
            $this->validate($request, $aturan);

            $tentang_kami_data = [
                'text1_tentang_kamis'               => $request->text1_tentang_kamis,
                'text2_tentang_kamis'               => $request->text2_tentang_kamis,
                'konten_sekilas_tentang_kamis'      => $request->konten_sekilas_tentang_kamis,
                'konten_tentang_kamis'              => $request->konten_tentang_kamis,
                'konten_footer_tentang_kamis'       => $request->konten_footer_tentang_kamis,
                'updated_at'                        => date('Y-m-d H:i:s'),
            ];
        }
        Tentang_kami::query()->update($tentang_kami_data);

        $setelah_simpan = [
            'alert'                     => 'sukses',
            'text'                      => 'Data tentang kami berhasil diperbarui',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan)->withInput($request->all());

    }

    public function tambahdetail() {
        $data['icon_tentang_kami_details']  = General::iconFontAwesome();
        return view('admin.tentang_kami.tambah',$data);
    }

    public function prosestambahdetail(Request $request) {
        $aturan = [
            'icon_tentang_kami_details'             => 'required',
            'judul_tentang_kami_details'            => 'required',
            'konten_tentang_kami_details'           => 'required',
        ];
        $this->validate($request, $aturan);

        $ambil_icon_tentang_kami = $request->icon_tentang_kami_details;
        $pisah_icon_tentang_kami = explode('_',$ambil_icon_tentang_kami);

        $data = [
            'judul_tentang_kami_details'            => $request->judul_tentang_kami_details,
            'icon_tentang_kami_details'             => $pisah_icon_tentang_kami[0],
            'konten_tentang_kami_details'           => $request->konten_tentang_kami_details,
            'created_at'                            => date('Y-m-d H:i:s'),
        ];

        Tentang_kami_detail::insert($data);
        
        if(request()->session()->get('halaman') != '')
            $redirect_halaman  = request()->session()->get('halaman');
        else
            $redirect_halaman  = 'dashboard/tentang-kami';

        return redirect($redirect_halaman);
    }

    public function editdetail(Request $request, $idtentang_kamidetails) {
        $cek_tentang_kami_details = Tentang_kami_detail::find($idtentang_kamidetails);
        if (!empty($cek_tentang_kami_details)) {
            $data['icon_tentang_kami_details']   = General::iconFontAwesome();
            $data['tentang_kami_details'] = Tentang_kami_detail::find($idtentang_kamidetails);
            return view('admin.tentang_kami.edit', $data);
        } else {
            return redirect('dashboard/tentang-kami');
        }
    }

    public function proseseditdetail(Request $request, $idtentang_kamidetails) {
        $cek_tentang_kami_details = Tentang_kami_detail::find($idtentang_kamidetails);
        if (!empty($cek_tentang_kami_details)) {
            $aturan = [
                'judul_tentang_kami_details'            => 'required',
                'icon_tentang_kami_details'             => 'required',
                'judul_tentang_kami_details'            => 'required',
                'konten_tentang_kami_details'           => 'required',
            ];
            $this->validate($request, $aturan);

            $ambil_icon_tentang_kami = $request->icon_tentang_kami_details;
            $pisah_icon_tentang_kami = explode('_',$ambil_icon_tentang_kami);

            $data = [
                'icon_tentang_kami_details'      => $pisah_icon_tentang_kami[0],
                'judul_tentang_kami_details'     => $request->judul_tentang_kami_details,
                'konten_tentang_kami_details'    => $request->konten_tentang_kami_details,
                'updated_at'                => date('Y-m-d H:i:s'),
            ];
            
            Tentang_kami_detail::find($idtentang_kamidetails)->update($data);
            
            if(request()->session()->get('halaman') != '')
                $redirect_halaman  = request()->session()->get('halaman');
            else
                $redirect_halaman  = 'dashboard/tentang-kami';

            return redirect($redirect_halaman);
        } else {
            return redirect('dashboard/tentang-kami');
        }
    }

    public function hapusdetail(Request $request, $idtentang_kamidetails) {
        try {
            $cek_tentang_kami_details = Tentang_kami_detail::find($idtentang_kamidetails);
            if (!empty($cek_tentang_kami_details)) {
                $deleted = Tentang_kami_detail::where('id_tentang_kami_details', $idtentang_kamidetails)->delete();
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