<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\Product;

//trang chủ
Route::get('/',[HomeController::class,'index']);
Route::get('/trang-chu',[HomeController::class,'index']);
//trang login
Route::get('/login_check',[LoginController::class,'login_page']);
//xử lý đăng ký
Route::post('/add-customer',[LoginController::class,'add_customer']);
//xử lý đăng nhập
Route::post('/login',[LoginController::class,'login']);
//xử lý đăng xuất
Route::get('/logout',[LoginController::class,'logout']);
//
Route::get('/thongtintaikhoan',[LoginController::class,'thongtintaikhoan']);

//Admin
//trang đăng nhập
Route::get('/admin',[AdminController::class,'index']);
//trang quản lý
Route::get('/dashboard',[AdminController::class,'show_dashboard']);
//xử lý đăng nhập
Route::post('/admin-dashboard',[AdminController::class,'admin_login']);
//xử lý đăng xuất
Route::get('/admin_logout',[AdminController::class,'admin_logout']);

//Category product
Route::get('/add-category-product',[CategoryProduct::class,'add_category_product']);
Route::get('/all-category-product',[CategoryProduct::class,'all_category_product']);

//nút thêm
Route::post('/save-category-product',[CategoryProduct::class,'save_category_product']);

//hiển thị
Route::get('/unactive-category-product/{category_product_id}',[CategoryProduct::class,'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}',[CategoryProduct::class,'active_category_product']);


//edit and delete
Route::get('/edit-category-product/{category_product_id}',[CategoryProduct::class,'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}',[CategoryProduct::class,'delete_category_product']);

Route::post('/update-category-product/{category_product_id}',[CategoryProduct::class,'update_category_product']);


////////Brand product
Route::get('/add-brand-product',[BrandProduct::class,'add_brand_product']);
Route::get('/all-brand-product',[BrandProduct::class,'all_brand_product']);

//nút thêm
Route::post('/save-brand-product',[BrandProduct::class,'save_brand_product']);

//hiển thị
Route::get('/unactive-brand-product/{brand_product_id}',[BrandProduct::class,'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}',[BrandProduct::class,'active_brand_product']);


//edit and delete
Route::get('/edit-brand-product/{brand_product_id}',[BrandProduct::class,'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}',[BrandProduct::class,'delete_brand_product']);

Route::post('/update-brand-product/{brand_product_id}',[BrandProduct::class,'update_brand_product']);



/////////////////////////Product(Sản phẩm)
Route::get('/add-product',[Product::class,'add_product']);
Route::get('/all-product',[Product::class,'all_product']);

//nút thêm
Route::post('/save-product',[Product::class,'save_product']);

//hiển thị
Route::get('/unactive-product/{product_id}',[Product::class,'unactive_product']);
Route::get('/active-product/{product_id}',[Product::class,'active_product']);


//edit and delete
Route::get('/edit-product/{product_id}',[Product::class,'edit_product']);
Route::get('/delete-product/{product_id}',[Product::class,'delete_product']);

Route::post('/update-product/{product_id}',[Product::class,'update_product']);


///////////////User của Trươngd
//chitietsanpham
Route::get('/chitietsanpham/{product_id}',[Product::class,'detailproduct']);
Route::post('/tim-kiem',[HomeController::class,'search']);
Route::post('/add-cart',[CartController::class,'add_cart_ajax']);
//danh muc san pham trang chu
Route::get('/danhmucsanpham/{category_id}',[CategoryProduct::class,'showcategoryhome']);
Route::get('/thuonghieusanpham/{category_id}',[BrandProduct::class,'showbrandhome']);
//gio hang
Route::post('/add-cart-ajax',[CartController::class,'add_cart_ajax']);
Route::get('/gio-hang',[CartController::class,'gio_hang']);
Route::post('/update-cart',[CartController::class,'update_cart']);
Route::get('/del-product/{session_id}',[CartController::class,'delete_product']);
Route::get('/del-all-product',[CartController::class,'delete_all_product']);
Route::post('/check-coupon',[CartController::class,'check_coupon']);
//ma giam gia
Route::get('/insert-coupon',[CouponController::class,'insert_coupon']);
Route::post('/insert-coupon-code',[CouponController::class,'insert_coupon_code']);
Route::get('/list-coupon',[CouponController::class,'list_coupon']);
Route::get('/delete-coupon/{coupon_id}',[CouponController::class,'delete_coupon']);
Route::post('/giohang',[CartController::class,'add_cart_ajax']);
//dat hang
Route::get('/checkout',[CheckController::class,'check_out']);
Route::post('/confirm-order',[CheckController::class,'confirm_order']);
