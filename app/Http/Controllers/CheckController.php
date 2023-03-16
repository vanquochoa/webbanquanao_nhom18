<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\OderDetails;
use App\Models\Shipping;
use App\Models\Oder;

class CheckController extends Controller
{
    public function confirm_order(Request $request){
        $data = $request->all();

        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
       //  $shipping_id = $shipping->shipping_id;

       //  $checkout_code = substr(md5(microtime()),rand(0,26),5);


       //  $order = new Oder;
       //  $order->customer_id = Session::get('customer_id');
       //  $order->shipping_id = $shipping_id;
       //  $order->order_status = 1;
       //  $order->order_code = $checkout_code;

       //  date_default_timezone_set('Asia/Ho_Chi_Minh');
       //  $order->created_at = now();
       //  $order->save();

       //  if(Session::get('cart')==true){
       //     foreach(Session::get('cart') as $key => $cart){
       //         $order_details = new OderDetails;
       //         $order_details->order_code = $checkout_code;
       //         $order_details->product_id = $cart['product_id'];
       //         $order_details->product_name = $cart['product_name'];
       //         $order_details->product_price = $cart['product_price'];
       //         $order_details->product_sales_quantity = $cart['product_qty'];
       //         $order_details->product_coupon =  $data['order_coupon'];
       //         $order_details->product_feeship = $data['order_fee'];
       //         $order_details->save();
       //     }
       //  }
       //  Session::forget('coupon');
       //  Session::forget('fee');
       //  Session::forget('cart');
   }
   public function check_out(Request $request){


   $user_info=Session::get('user_info');
      $meta_desc = "Đăng nhập thanh toán";
      $meta_keywords = "Đăng nhập thanh toán";
      $meta_title = "Đăng nhập thanh toán";
      $url_canonical = $request->url();
      //--seo

      $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
      $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();

      return view('pages.showcheck')->with('user_info',$user_info)->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
      ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
  }
}
