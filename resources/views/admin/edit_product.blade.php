@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sản phẩm
                </header>
                <div class="panel-body">
                    @if (isset($message_info))
                        <span style="color: red; font-weight: bold" class="text">{{ $message_info }}</span>
                        {{ Session::put('message_info', null) }}
                    @else
                        <span></span>
                    @endif


                    <div class="position-center">
                        @foreach ($edit_product as $item) 
                        <form role="form" action="{{ URL::to('/update-product/'.$item->product_id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input value="{{$item->product_name}}" name="product_name" type="text" class="form-control" placeholder="tên danh mục">
                            </div>
                            @endforeach
                            <div class="form-group">
                                <label for="">Danh mục sản phẩm</label>
                                <select name="product_cate" class="form-control input-sm m-bot15">
                                    @foreach ($cate_product as $item)
                                    <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Thương hiệu sản phẩm</label>
                                <select name="product_brand" class="form-control input-sm m-bot15">
                                    @foreach ($brand_product as $item)
                                    <option value="{{$item->brand_id}}">{{$item->brand_name}}</option>
                                    @endforeach
                                    
                                    
                                </select>
                            </div>
                            @foreach ($edit_product as $item)
                                
                           
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input name="product_price" type="text" class="form-control" value="{{$item->product_price}}" placeholder="giá sản phẩm">
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh sản phẩm</label>
                                <input name="product_image" type="file" class="form-control">
                                <img src="{{URL::to('public/uploads/product/'.$item->product_image)}}" height="100" width="100" alt="" >
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="product_desc">{{$item->product_desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control"  name="product_content">{{$item->product_content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Hiển thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    @if ($item->product_status=0)
                                    <option value="0">Ẩn</option>
                                    @else
                                    <option value="1">Hiện</option>
                                    @endif
                                    
                                    
                                </select>
                            </div>
                            @endforeach

                            <button type="submit" name="update_product" class="btn btn-info">Cập nhật</button>
                        </form>
                       
                        
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
