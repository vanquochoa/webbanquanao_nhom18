<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BrandProduct extends Controller
{
    //
    public function all_brand_product()
    {
        $all_brand_product = DB::table('tbl_brand_product')->get();
        $admin_info = Session::get('admin_info');
        $capnhat_brand=Session::get('message');
        return view('admin.all_brand_product')->with('capnhat',$capnhat_brand)->with('all_brand_product', $all_brand_product)->with('admin_info', $admin_info);
    }
    public function add_brand_product()
    {
        $admin_info = Session::get('admin_info');
        $message = Session::get('message_info');
        return view('admin.add_brand_product')->with('message_info', $message)->with('admin_info', $admin_info);
    }

    //nút thêm
    public function save_brand_product(Request $request)
    {
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;
        DB::table('tbl_brand_product')->insert($data);
        Session::put('message_info', 'Thêm thương hiệu thành công');
        return redirect('add-brand-product');
    }

    //Hiển thị
    public function active_brand_product($brand_product_id)
    {
        // $active=DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->get();
        // dd($active);
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->update(['brand_status' => 0]);
        return redirect('all-brand-product');
    }
    public function unactive_brand_product($brand_product_id)
    {
        // $unactive=DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->get();
        // dd($unactive);
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->update(['brand_status' => 1]);
        return redirect('all-brand-product');
    }


    //edit and delete
    public function edit_brand_product($brand_product_id)
    {
        $edit=
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->first();
        $admin_info = Session::get('admin_info');
        return view('admin.edit_brand_product')->with('edit_brand_product',$edit)->with('admin_info', $admin_info);
    }
    public function delete_brand_product($brand_product_id)
    {
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return redirect('all-brand-product');
    }

    //nút cập nhật
    public function update_brand_product(Request $request, $brand_product_id){
        $data=array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->update($data);
        Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return redirect('all-brand-product');
    }

/////user của trươngd
public function showbrandhome($brand_id)
    {
        $user_info=Session::get('user_info');
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->get();
        $brand_name = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id',$brand_id)->limit(1)->get();
         $brand_by_id = DB::table('tbl_product')->join ('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')->where('tbl_product.brand_id','=',$brand_id)->get();
        return view('pages.showbrand')->with('user_info',$user_info)->with('category',$category_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);
    }

}
