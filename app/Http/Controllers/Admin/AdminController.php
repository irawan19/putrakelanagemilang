<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\General;
use Storage;

class AdminController extends AdminCoreController {

    public function index(Request $request) {
        $data['hasil_kata']         = '';
        $url_sekarang               = $request->fullUrl();
        $data['admins']             = User::orderBy('name')->paginate(10);
        session()->forget('hasil_kata');
        session()->forget('halaman');
        session(['halaman'          => $url_sekarang]);
        return view('admin.admin.lihat',$data);
    }

    public function cari(Request $request) {
        $hasil_kata                 = $request->cari_kata;
        $data['hasil_kata']         = $hasil_kata;
        $url_sekarang               = $request->fullUrl();
        $data['admins']             = User::Where('name', 'LIKE', '%'.$hasil_kata.'%')
                                        ->orWhere('username', 'LIKE', '%'.$hasil_kata.'%')
                                        ->orWhere('email', 'LIKE', '%'.$hasil_kata.'%')
                                        ->paginate(10);
        session(['hasil_kata'		=> $hasil_kata]);
        session(['halaman'          => $url_sekarang]);
        return view('admin.admin.lihat', $data);
    }

    public function tambah(Request $request) {
        return view('admin.admin.tambah');
    }

    public function prosestambah(Request $request) {
        $aturan = [
            'username'              => 'required|unique:users',
            'name'                  => 'required',
            'email'                 => 'required|unique:users',
            'password'              => 'required|string|min:6|confirmed',
        ];
        $this->validate($request, $aturan);

        $data = [
            'name'               	=> $request->name,
            'username'              => $request->username,
            'email'              	=> $request->email,
            'created_at'         	=> date('Y-m-d H:i:s'),
            'password'           	=> bcrypt($request->password),
            'remember_token'     	=> str_random(100),
        ];

        User::insert($data);
        
        if(request()->session()->get('halaman') != '')
            $redirect_halaman  = request()->session()->get('halaman');
        else
            $redirect_halaman  = 'dashboard/admin';

        return redirect($redirect_halaman);
    }

    public function edit(Request $request, $idadmin) {
        $cek_admins = User::find($idadmin);
        if (!empty($cek_admins)) {
            $data['admins'] = User::find($idadmin);
            return view('admin.admin.edit', $data);
        } else {
            return redirect('dashboard/slideshow');
        }
    }

    public function prosesedit(Request $request, $idadmin) {
        $cek_admins = User::find($idadmin);
        if (!empty($cek_admins)) {
            if (!empty($request->password)) {
                $aturan = [
                    'username'              => 'required|unique:users',
                    'name'                  => 'required',
                    'email'                 => 'required|unique:users',
                    'password'              => 'required|string|min:6|confirmed',
                ];
                $this->validate($request, $aturan);
        
                $data = [
                    'name'               	=> $request->name,
                    'username'              => $request->username,
                    'email'              	=> $request->email,
                    'updated_At'         	=> date('Y-m-d H:i:s'),
                    'password'           	=> bcrypt($request->password),
                ];
            } else {
                $aturan = [
                    'username'              => 'required|unique:users,username,'.$idadmin.',id',
                    'name'                  => 'required',
                    'email'                 => 'required|unique:users,email,'.$idadmin.',id',
                ];
                $this->validate($request, $aturan);
        
                $data = [
                    'name'               	=> $request->name,
                    'username'              => $request->username,
                    'email'              	=> $request->email,
                    'updated_at'         	=> date('Y-m-d H:i:s'),
                ];
            }
            User::find($idadmin)->update($data);
            
            if(request()->session()->get('halaman') != '')
                $redirect_halaman  = request()->session()->get('halaman');
            else
                $redirect_halaman  = 'dashboard/admin';

            return redirect($redirect_halaman);
        } else {
            return redirect('dashboard/slideshow');
        }
    }

    public function hapus($idadmin) {
        try {
            $cek_admins = User::find($idadmin);
            if (!empty($cek_admins)) {
                // Jangan izinkan menghapus diri sendiri
                if ($cek_admins->id == auth()->id()) {
                    return response()->json(['error' => 'Tidak dapat menghapus akun sendiri'], 403);
                }
                $deleted = User::where('id', $idadmin)->delete();
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