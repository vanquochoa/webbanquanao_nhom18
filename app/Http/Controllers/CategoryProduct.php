<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class CategoryProduct extends Controller
{
    public function all_category_product()
    {
        $all_category_product = DB::table('tbl_category_product')->get();
        $admin_info = Session::get('admin_info');
        $capnhat_category = Session::get('message');
        return view('admin.all_category_product')->with('capnhat', $capnhat_category)->with('all_category_product', $all_category_product)->with('admin_info', $admin_info);
    }
    public function add_category_product()
    {
        $admin_info = Session::get('admin_info');
        $message = Session::get('message_info');
        return view('admin.add_category_product')->with('message_info', $message)->with('admin_info', $admin_info);
    }

    //nút thêm
    public function save_category_product(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        DB::table('tbl_category_product')->insert($data);
        Session::put('message_info', 'Thêm danh mục thành công');
        return redirect('add-category-product');
    }

    //Hiển thị
    public function active_category_product($category_product_id)
    {
        // $active=DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
        // dd($active);
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status' => 0]);
        return redirect('all-category-product');
    }
    public function unactive_category_product($category_product_id)
    {
        // $unactive=DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
        // dd($unactive);
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status' => 1]);
        return redirect('all-category-product');
    }


    //edit and delete
    public function edit_category_product($category_product_id)
    {
        $edit =
            DB::table('tbl_category_product')->where('category_id', $category_product_id)->first();
        $admin_info = Session::get('admin_info');
        return view('admin.edit_category_product')->with('edit_category_product', $edit)->with('admin_info', $admin_info);
    }
    public function delete_category_product($category_product_id)
    {
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return redirect('all-category-product');
    }

    //nút cập nhật
    public function update_category_product(Request $request, $category_product_id)
    {
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update($data);
        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
        return redirect('all-category-product');
    }

    //////user của trường
    //user
    public function showcategoryhome($category_id)
    {
        $user_info=Session::get('user_info');
        $category_product = DB::table('tbl_category_product')->where('category_status', '1')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->get();
        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id', $category_id)->limit(1)->get();
        $category_byid = DB::table('tbl_product')->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')->where('tbl_product.category_id', '=', $category_id)->get();
        return view('pages.showcategory')->with('user_info',$user_info)->with('category', $category_product)->with('brand', $brand_product)->with('categorybyid', $category_byid)->with('category_name', $category_name);
    }
}
