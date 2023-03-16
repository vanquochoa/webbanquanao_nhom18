<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Validator;

session_start();

class LoginController extends Controller
{
    //đăng ký
    public function add_customer(Request $request)
    {

        $data = array();
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_pass);
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;


        $customer_id = DB::table('tbl_customer')->insert($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return Redirect('/login_check');
    }
    public function logout()
    {
        Session::forget('user_info');
        // return redirect($request->server('HTTP_REFERER'), 302);
        return redirect('/login_check');
    }

    public function login(Request $request)
    {

        $email = $request->email;
        $pass = md5($request->pass);
        // $email='hoa@gmail.com';
        // $pass=md5(123456);
        $result = DB::table('tbl_customer')->where('customer_email', $email)->where('customer_password', $pass)->first();
        // dd($result);
        // dd($result->customer_email);
        if ((isset($result->customer_email))) {
            Session::put('user_info', $result);
            return Redirect::to('/trang-chu');
        } else {
            return Redirect($_SERVER['HTTP_REFERER'])->withErrors(['Tài khoản hoặc mật khẩu bị sai'], 'loginErrors');
        }
    }

    public  function login_page()
    { $category_product = DB::table('tbl_category_product')->where('category_status','1')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->limit(6)->get();

        return view('pages.login_check')->with('category',$category_product)->with('brand',$brand_product)->with('allproduct',$all_product);
    }

    public function thongtintaikhoan()
    {
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->limit(6)->get();

        $user_info=Session::get('user_info');
        return view('pages.userinfo')->with('user_info',$user_info)->with('category',$category_product)->with('brand',$brand_product)->with('allproduct',$all_product);
    }
}
