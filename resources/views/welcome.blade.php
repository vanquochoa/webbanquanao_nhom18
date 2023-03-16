<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | SinhVienStore</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}} " rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/sweetalert.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 786801881</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> sinhvienstore@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{URL::to('trang-chu')}}"><img src="{{('frontend/images/logosvt.png')}}" width="200" height="100" alt="" /></a>
						</div>

					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
								<li><a href="#"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								<li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>

								@if (isset($user_info))
								<li><a href="{{URL::to('thongtintaikhoan')}}"><i class="fa fa-user"></i> {{$user_info->customer_name}}</a></li>

								<li><a href="{{URL::to('logout')}}"><i class="fa fa-lock"></i> Đăng Xuất</a></li>

								@else
								<li><a href="{{URL::to('login_check')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>

								@endif



							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('trang-chu')}}" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="#">Cửa hàng<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="/trang-chu">Sản Phẩm</a></li>
										<li><a href="#">Thanh toán</a></li>
										<li><a href="/gio-hang">Giỏ hàng</a></li>
										<li><a href="/login_check">Đăng nhập</a></li>
                                    </ul>
                                </li>
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="#">Blog List</a></li>

                                    </ul>
                                </li>

								<li><a href="contact-us.html">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<form action="{{URL::to('/tim-kiem')}}" method="POST">
							{{csrf_field()}}
						<div class="search_box pull-right">
							<input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm"/>
							<input type="submit" style="margin-top:0;color:#666" name="search_item" class="btn btn-primary btn-sm" value="Tìm kiếm">
						</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span></span>SinhVienStore</h1>
									<h2>Giá siêu rẻ</h2>
									<p>Có mã giảm giá cho sinh viên có thẻ </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{('/public/uploads/product/somi182.jpg')}}" class="girl img-responsive" alt="" Width ="300" height ="200"/>
									{{-- <img src="{{('frontend/images/pricing.png')}}"  class="pricing" alt="" /> --}}
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span></span>SinhVienStore</h1>
									<h2>100% tự thiết kế</h2>
									<p>Chuẩn modern giới trẻ </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{('/public/uploads/product/drop364.jpg')}}" class="girl img-responsive" alt="" Width ="300" height ="200" />
									{{-- <img src="{{('frontend/images/pricing.png')}}"  class="pricing" alt="" /> --}}
								</div>
							</div>

							<div class="item">
								<div class="col-sm-6">
									<h1><span>SinhVienStore</h1>
									<h2>FreeShip cho đơn hàng trên 500.000đ</h2>
									<p>Giao hàng tận nơi uy tín </p>
									
								</div>
								<div class="col-sm-6">
									<img src="{{('/public/uploads/product/drop444.jpg')}}" class="girl img-responsive" alt="" Width ="300" height ="200" />
									{{-- <img src="{{('frontend/images/pricing.png')}}" width="400" height="400" class="pricing" alt="" /> --}}
								</div>
							</div>

						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section><!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh Mục Sản Phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						@foreach ($category as $key => $categoryproduct)

                            <div class="panel panel-default">

							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URl::to('/danhmucsanpham/'.$categoryproduct->category_id)}}">{{$categoryproduct->category_name}}</a></h4>
								</div>
							</div>

                         @endforeach
						</div><!--/category-products-->

						<div class="brands_products"><!--brands_products-->
							<h2>Thương Hiệu</h2>
                            @foreach ($brand as $key => $brandproduct)
							<div class="brands-name">

								<ul class="nav nav-pills nav-stacked">
									<li><a href="{{URl::to('/thuonghieusanpham/'.$brandproduct->brand_id)}}"> <span class="pull-right"></span>{{$brandproduct->brand_name}}</a></li>

								</ul>
							</div>
                            @endforeach
						</div><!--/brands_products-->



						<div class="shipping text-center"><!--shipping-->
							<img src="{{('frontend/images/shipping.jpg')}}" alt="" />
						</div><!--/shipping-->

					</div>
				</div>

				<div class="col-sm-9 padding-right">


					@yield('content')

				</div>
			</div>
		</div>
	</section>

	<footer id="footer"><!--Footer-->

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hỗ trợ trực tuyến</a></li>
								<li><a href="#">Liên hệ chúng tôi</a></li>
								<li><a href="#">Tình trạng đặt hàng</a></li>						
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>Sản phẩm</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>						
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>Chính sách</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Điều khoản sử dụng</a></li>
								<li><a href="#">Chính sách bảo mật</a></li>
								<li><a href="#">Chính sách hoàn tiền</a></li>						
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>Giới thiệu</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Thông tin cửa hàng</a></li>
								<li><a href="#">Nghề nghiệp</a></li>
								<li><a href="#">Vị trí cửa hàng</a></li>							
							</ul>
						</div>
					</div>
					

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Nếu có điều gì thắc hãy liên hệ với chúng tôi</p>
					<p class="pull-right">Văn Quốc Hòa</p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->



    <script src="{{asset('frontend/js/jquery.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('frontend/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
	<script type="text/javascript"> $(document).ready(function(){
		$('.add-to-cart').click(function(){
			var id= $(this).data('id_product');
			var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                //var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();

				$.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:
							cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                        success:function(data){

                            swal({
                                    title: "Đã thêm sản phẩm vào giỏ hàng",
                                    text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem tiếp",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Đi đến giỏ hàng",
                                    closeOnConfirm: false
                                },
                                function() {
                                    window.location.href = "{{url('/gio-hang')}}";
                                });
							}

						});
		});
	});
	

	</script>
    <script type="text/javascript">
    $(document).ready(function(){
		  $('.send_order').click(function(){
			//   swal({
			// 	title: "Xác nhận đơn hàng",
			// 	text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
			// 	type: "warning",
			// 	showCancelButton: true,
			// 	confirmButtonClass: "btn-danger",
			// 	confirmButtonText: "Cảm ơn, Mua hàng",

			// 	  cancelButtonText: "Đóng,chưa mua",
			// 	  closeOnConfirm: false,
			// 	  closeOnCancel: false
			//   },
			//   function(isConfirm){
			// 	   if (isConfirm) {
					  var shipping_email = $('.shipping_email').val();
					  //alert(shipping_email);
					  var shipping_name = $('.shipping_name').val();
					  var shipping_address = $('.shipping_address').val();
					  var shipping_phone = $('.shipping_phone').val();
					  var shipping_notes = $('.shipping_notes').val();
					  var shipping_method = $('.payment_select').val();
					  //var order_fee = $('.order_fee').val();
					  var order_coupon = $('.order_coupon').val();
					  var _token = $('input[name="_token"]').val();

					  $.ajax({
						  url: '{{url('/confirm-order')}}',
						  method: 'POST',
						  data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,
							shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_coupon:order_coupon,shipping_method:shipping_method},
						  success:function(){
							alert('Dat hang thanh cong');
						  }
							 //swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
					// 	  }
					//   });

					//   window.setTimeout(function(){
					// 	  location.reload();
					//   } ,3000);

					// } else {
					//   swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

					// }

			  });


		 });
	 });


    </script>
</body>
</html>
