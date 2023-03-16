<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        $admin_info=Session::get('admin_info');
        return view('admin_login')->with('admin_info',$admin_info);
    }


    public function show_dashboard()
    {      
        $admin_info=Session::get('admin_info');
        if(isset($admin_info)){
            return view('admin.dashboard')->with('admin_info',$admin_info);
        }else{
            return redirect('/admin');
        }
        
    }

    public function admin_login(Request $request){
        $admin_email=$request->admin_email;
        $admin_password=$request->admin_password;

        $result=DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        // dd($result);
        if ((isset($result->admin_email))) {
            Session::put('admin_info', $result);
            
            return Redirect::to('dashboard');
        } else {
            return Redirect($_SERVER['HTTP_REFERER'])->withErrors(['Tài khoản hoặc mật khẩu bị sai'], 'loginErrors');
        }
    }

    public function admin_logout()
    {
        Session::forget('admin_info');
        // return redirect($request->server('HTTP_REFERER'), 302);
        return redirect('/admin');
    }
}
