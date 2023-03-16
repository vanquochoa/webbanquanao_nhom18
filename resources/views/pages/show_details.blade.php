@extends('welcome')
@section('content')
@foreach ($detailproduct as $key => $value)

<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            {{-- <img src="public/uploads/product/{{$value->product_image}}" alt="" /> --}}
            {{-- <img src="public/uploads/product/{{ $value->product_image}}"/> --}}
            <img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" alt="" />
            <h3>ZOOM</h3>
        </div>


    </div>
    <div class="col-sm-7">
        <div class="product-information">
            {{-- <form><!--/product-information-->
                @csrf
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$value->product_name}}</h2>
            <p>{{$value->product_id}}</p>
            <img src="images/product-details/rating.png" alt="" />
            <span>
                <span>{{number_format($value->product_price)}} VND</span>
                <label>Quantity:</label>
                <input type="number" min="1" value="1" />
                <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">Thêm vào giỏ hàng</button>
            </span>
        </form>
            <p><b>Tình trạng :</b>Còn hàng</p>
            <p><b>Điều kiện :</b>100%  New</p>
            <p><b>Thương hiệu :</b>{{$value->brand_name}} </p>
            <p><b>Thương hiệu :</b>{{$value->category_name}} </p>
            <a href=""><img src="{{URL::to('/frontend/images/share.png')}}" class="share img-responsive"  alt="" /></a> --}}
            <form>
                @csrf
                {{-- <img src="{{URl::to('/public/uploads/product/'.$product->product_image)}}" alt="" height="400px" width="400px"/> --}}

                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                <h2>{{$value->product_name}}</h2>
                
                <img src="images/product-details/rating.png" alt="" />
                <span>
                    <span>{{number_format($value->product_price)}} VND</span>
                    <label>Quantity:</label>
                    <input type="number" min="1" value="1" />

                </span>
                <input type="hidden" name="" value="{{ $value->product_id  }}" class="cart_product_id_{{ $value->product_id  }}">
                <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
{{--
                <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                 --}}
                <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                <input type="hidden" value="1" class="cart_product_qty_{{$value->product_id}}">

                <p><b>Tình trạng :</b>Còn hàng</p>
                <p><b>Điều kiện :</b>100%  New</p>
                <p><b>Thương hiệu :</b>{{$value->brand_name}} </p>
                <p><b>Loại :</b>{{$value->category_name}} </p>
                <a href=""><img src="{{URL::to('/frontend/images/share.png')}}" class="share img-responsive"  alt="" /></a>
                <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">Thêm vào giỏ hàng</button>

            {{-- <a href="{{ URl::to('/add_sp/'.$product->product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}


            </form>
        </div>
</div>


<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active" ><a href="#details" data-toggle="tab">Chi tiết</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Mô tả</a></li>
            <li ><a href="#reviews" data-toggle="tab">Đánh giá (5)</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details" >
            {{$value->product_content}}

        </div>
        <div class="tab-pane fade" id="companyprofile" >
            <div class="col-sm-3">
                {{$value->product_desc}}
            </div>

        </div>


        <div class="tab-pane fade " id="reviews" >
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p>

                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name"/>
                        <input type="email" placeholder="Email Address"/>
                    </span>
                    <textarea name="" ></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endforeach


@endsection
