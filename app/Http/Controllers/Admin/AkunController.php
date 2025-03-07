<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\General;
use Storage;
use Auth;

class AkunController extends AdminCoreController {

    public function index() {
        session()->forget('halaman');
        return view('admin.akun.lihat');
    }

    public function prosesedit(Request $request) {
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
                'username'              => 'required|unique:users,username,'.Auth::user()->id.',id',
                'name'                  => 'required',
                'email'                 => 'required|unique:users,email,'.Auth::user()->id.',id',
            ];
            $this->validate($request, $aturan);
    
            $data = [
                'name'               	=> $request->name,
                'username'              => $request->username,
                'email'              	=> $request->email,
                'updated_at'         	=> date('Y-m-d H:i:s'),
            ];
        }
        User::find(Auth::user()->id)->update($data);
        
        $setelah_simpan = [
            'alert'                     => 'sukses',
            'text'                      => 'Data akun berhasil diperbarui',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan)->withInput($request->all());
    }

}