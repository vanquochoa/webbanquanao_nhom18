@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
    @foreach ($brand_name as $key =>$name1 )

    <h2 class="title text-center">{{$name1->brand_name}} </h2>
    @endforeach
    @foreach ($brand_by_id as $key => $product)
    <a href="{{URL::to('/chitietsanpham/'.$product->product_id)}}">
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    {{-- <div class="productinfo text-center">
                        <img src="{{URl::to('/public/uploads/product/'.$product->product_image)}}" alt="" />

                        <h2>{{number_format($product->product_price)}} vnd </h2>
                        <p>{{$product->product_name}}</p>


                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div> --}}
                    <form>
                        @csrf
                        <img src="{{URl::to('/public/uploads/product/'.$product->product_image)}}" alt="" height="400px" width="400px"/>

                        <h2>{{number_format($product->product_price)}} VND </h2>
                        <p>{{$product->product_name}}</p>
                        <input type="hidden" name="" value="{{ $product->product_id  }}" class="cart_product_id_{{ $product->product_id  }}">
                        <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
    {{--
                        <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                         --}}
                        <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">




                    {{-- <a href="{{ URl::to('/add_sp/'.$product->product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                        </a>
                    <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">Thêm vào giỏ hàng</button>
                    </form>

            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào yêu thích</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                </ul>
            </div>
        </div>
    </div>
    </a>
@endforeach

</div>
@endsection
