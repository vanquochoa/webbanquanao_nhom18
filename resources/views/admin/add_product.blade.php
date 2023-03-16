@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                    @if (isset($message_info))
                        <span style="color: red; font-weight: bold" class="text">{{ $message_info }}</span>
                        {{ Session::put('message_info', null) }}
                    @else
                        <span></span>
                    @endif


                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/save-product') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input name="product_name" type="text" class="form-control" placeholder="tên danh mục">
                            </div>
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
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input name="product_price" type="text" class="form-control" placeholder="tên danh mục">
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh sản phẩm</label>
                                <input name="product_image" type="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="product_desc" placeholder="Mô tả danh mục..."></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control" name="product_content" placeholder="Mô tả danh mục..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Hiển thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiện</option>
                                </select>
                            </div>

                            <button type="submit" name="add_category_product" class="btn btn-info">Thêm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
