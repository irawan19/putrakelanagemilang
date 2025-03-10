<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\Layanan_detail;
use App\Helpers\General;
use Storage;

class LayananController extends AdminCoreController {
    
    public function index()
    {
        $data['layanans']       = Layanan::first();
        $data['layanan_details']= Layanan_detail::get();
        session()->forget('halaman');
        return view('admin.layanan.lihat',$data);
    }

    public function prosesedit(Request $request)
    {
        $aturan = [
            'text_layanans'        => 'required',
        ];
        $this->validate($request, $aturan);

        $layanan_data = [
            'text_layanans'        => $request->text_layanans,
            'updated_at'            => date('Y-m-d H:i:s'),
        ];
        Layanan::query()->update($layanan_data);

        $setelah_simpan = [
            'alert'                     => 'sukses',
            'text'                      => 'Data layanan berhasil diperbarui',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan)->withInput($request->all());

    }

    public function tambahdetail() {
        $data['icon_layanan_details']  = General::iconlayanan();
        return view('admin.layanan.tambah',$data);
    }

    public function prosestambahdetail(Request $request) {
        $aturan = [
            'userfile_gambar_layanan_detail'   => 'required|mimes:jpg,jpeg,png',
            'icon_layanan_details'             => 'required',
            'judul_layanan_details'             => 'required',
            'konten_layanan_details'           => 'required',
        ];
        $this->validate($request, $aturan);

        $ambil_icon_layanan = $request->icon_layanan_details;
        $pisah_icon_layanan = explode('_',$ambil_icon_layanan);

        $judul_gambar_layanan_detail = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_layanan_detail')->getClientOriginalName())));
        $path_gambar_layanan_detail = 'layanan/';
        Storage::disk('public')->put($path_gambar_layanan_detail . $judul_gambar_layanan_detail, file_get_contents($request->file('userfile_gambar_layanan_detail')));

        $data = [
            'gambar_layanan_details'        => $path_gambar_layanan_detail.$judul_gambar_layanan_detail,
            'judul_layanan_details'         => $request->judul_layanan_details,
            'icon_layanan_details'          => $pisah_icon_layanan[0],
            'konten_layanan_details'        => $request->konten_layanan_details,
            'created_at'                    => date('Y-m-d H:i:s'),
        ];

        Layanan_detail::insert($data);
        
        if(request()->session()->get('halaman') != '')
            $redirect_halaman  = request()->session()->get('halaman');
        else
            $redirect_halaman  = 'dashboard/layanan';

        return redirect($redirect_halaman);
    }

    public function editdetail(Request $request, $idlayanandetails) {
        $cek_layanan_details = Layanan_detail::find($idlayanandetails);
        if (!empty($cek_layanan_details)) {
            $data['icon_layanan_details']   = General::iconlayanan();
            $data['layanan_details'] = Layanan_detail::find($idlayanandetails);
            return view('admin.layanan.edit', $data);
        } else {
            return redirect('dashboard/layanan');
        }
    }

    public function proseseditdetail(Request $request, $idlayanandetails) {
        $cek_layanan_details = Layanan_detail::find($idlayanandetails);
        if (!empty($cek_layanan_details)) {
            if(!empty($request->userfile_gambar_layanan_detail)) {
                $aturan = [
                    'userfile_gambar_layanan_detail'    => 'required|mimes:jpg,jpeg,png',
                    'icon_layanan_details'              => 'required',
                    'judul_layanan_details'             => 'required',
                    'konten_layanan_details'            => 'required',
                ];
                $this->validate($request, $aturan);

                $ambil_icon_layanan = $request->icon_layanan_details;
                $pisah_icon_layanan = explode('_',$ambil_icon_layanan);

                $gambar_layanan_detail_lama = $cek_layanan_details->gambar_layanan_details;
                if (Storage::disk('public')->exists($gambar_layanan_detail_lama))
                    Storage::disk('public')->delete($gambar_layanan_detail_lama);

                $nama_gambar_layanan_detail = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_layanan_detail')->getClientOriginalName())));
                $path_gambar_layanan_detail = 'layanan_detail/';
                Storage::disk('public')->put($path_gambar_layanan_detail . $nama_gambar_layanan_detail, file_get_contents($request->file('userfile_gambar_layanan_detail')));

                $data = [
                    'gambar_layanan_details'    => $path_gambar_layanan_detail . $nama_gambar_layanan_detail,
                    'icon_layanan_details'          => $pisah_icon_layanan[0],
                    'judul_layanan_details'     => $request->judul_layanan_details,
                    'konten_layanan_details'    => $request->konten_layanan_details,
                    'updated_at'                => date('Y-m-d H:i:s'),
                ];
            } else {
                $aturan = [
                    'judul_layanan_details' => 'required',
                    'icon_layanan_details'              => 'required',
                    'judul_layanan_details'             => 'required',
                    'konten_layanan_details'            => 'required',
                ];
                $this->validate($request, $aturan);

                $ambil_icon_layanan = $request->icon_layanan_details;
                $pisah_icon_layanan = explode('_',$ambil_icon_layanan);

                $data = [
                    'icon_layanan_details'      => $pisah_icon_layanan[0],
                    'judul_layanan_details'     => $request->judul_layanan_details,
                    'konten_layanan_details'    => $request->konten_layanan_details,
                    'updated_at'                => date('Y-m-d H:i:s'),
                ];
            }
            
            Layanan_detail::find($idlayanandetails)->update($data);
            
            if(request()->session()->get('halaman') != '')
                $redirect_halaman  = request()->session()->get('halaman');
            else
                $redirect_halaman  = 'dashboard/layanan';

            return redirect($redirect_halaman);
        } else {
            return redirect('dashboard/layanan');
        }
    }

    public function hapusdetail(Request $request, $idlayanandetails) {
        $cek_layanan_details = Layanan_detail::find($idlayanandetails);
        if (!empty($cek_layanan_details)) {
            Storage::disk('public')->delete($cek_layanan_details->gambar_layanan_details);
            Layanan_detail::find($idlayanandetails)->delete();
            return response()->json(['sukses' => '"sukses'], 200);
        } else {
            return redirect('dashboard/layanan');
        }
    }

}