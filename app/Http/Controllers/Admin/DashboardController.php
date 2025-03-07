<?php

namespace App\Http\Controllers\Admin;

use App\Models\Master_status_tugas;
use Illuminate\Http\Request;
use Auth;
use App\Models\Session;
use App\Models\User;
use App\Models\Aplikasi;

class DashboardController extends AdminCoreController
{
    public function logout(Request $request)
    {
        $check_session = Session::where('user_id',Auth::user()->id)->count();
        if($check_session != 0)
            Session::where('user_id',Auth::user()->id)->delete();

        $users_data = [
            'remember_token' => ''
        ];
        User::where('id',Auth::user()->id)
                ->update($users_data);

        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/login');
    }

    public function index()
    {
        $data['lihat_Aplikasis']    = Aplikasi::first();
        return view('admin.dashboard.lihat',$data);
    }

}