<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Product extends Controller
{
    public function all_product()
    {
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')->orderBy('tbl_product.brand_id', 'desc')->get();
        $admin_info = Session::get('admin_info');
        $capnhat = Session::get('message');

        return view('admin.all_product')->with('capnhat_sanpham', $capnhat)->with('all_product', $all_product)->with('admin_info', $admin_info);
    }
    public function add_product()
    {
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderBy('brand_id', 'desc')->get();
        $admin_info = Session::get('admin_info');
        $message = Session::get('message_info');
        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product)->with('message_info', $message)->with('admin_info', $admin_info);
    }

    //nút thêm
    public function save_product(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));

            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message_info', 'Thêm sản phẩm thành công');
            return redirect('add-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message_info', 'Thêm sản phẩm thành công');
        return redirect('add-product');
    }

    //Hiển thị
    public function active_product($product_id)
    {
        // $active=DB::table('tbl_product')->where('category_id', $category_product_id)->get();
        // dd($active);
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        return redirect('all-product');
    }
    public function unactive_product($product_id)
    {
        // $unactive=DB::table('tbl_product')->where('category_id', $category_product_id)->get();
        // dd($unactive);
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        return redirect('all-product');
    }


    //edit and delete
    public function edit_product($product_id)
    {
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderBy('brand_id', 'desc')->get();
        $edit = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $admin_info = Session::get('admin_info');
        return view('admin.edit_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product)->with('edit_product', $edit)->with('admin_info', $admin_info);
    }
    public function delete_product($product_id)
    {
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return redirect('all-product');
    }

    //nút cập nhật
    public function update_product(Request $request, $product_id)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');


        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));

            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công');
            return redirect('all-product');
        }

        DB::table('tbl_product')->where('product_id', $product_id)->update($data);

        return redirect('all-product');
    }
    //



    ///////////////User của trường
    public function detailproduct($product_id)
    {
        $user_info=Session::get('user_info');

        $category_product = DB::table('tbl_category_product')->where('category_status', '1')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->get();

        $detail_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_product.product_id', $product_id)->get();



        return view('pages.show_details')->with('user_info', $user_info)->with('category', $category_product)->with('brand', $brand_product)->with('detailproduct', $detail_product);
    }
}
