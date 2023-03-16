<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        //bổ sung của trường
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->limit(6)->get();

        $user_info=Session::get('user_info');
        return view('pages.home')->with('user_info',$user_info)->with('category',$category_product)->with('brand',$brand_product)->with('allproduct',$all_product);
    }


    ///user của trường
    public function search(Request $request){
        $keywords = $request->keywords_submit;
         $category_product = DB::table('tbl_category_product')->where('category_status','1')->get();
         $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->get();
         
         $search_product = DB::table('tbl_product')->where('product_name','like','%' .$keywords. '%')->get();
         return view('pages.search')->with('category',$category_product)->with('brand',$brand_product)->with('search_product',$search_product);
         
     }
}
