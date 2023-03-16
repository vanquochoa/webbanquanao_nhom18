@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thương hiệu sản phẩm sản phẩm
                </header>
                <div class="panel-body">
                    @if (isset($message_info))
                        <span style="color: red; font-weight: bold" class="text">{{ $message_info }}</span>
                        {{ Session::put('message_info', null) }}
                    @else
                        <span></span>
                    @endif
                    <div class="position-center">
                        @if (isset($edit_brand_product))
                        <form role="form" action="{{ URL::to('/update-brand-product/'.$edit_brand_product->brand_id) }}" method="POST">
                            {{ csrf_field() }}
                            
                                <div class="form-group">
                                    <label>Tên thương hiệu</label>

                                    <input name="brand_product_name" value="{{$edit_brand_product->brand_name}}" type="text" class="form-control"
                                        placeholder="tên danh mục">
                                </div>
                                <div class="form-group">

                                    <label>Mô tả</label>
                                    <textarea class="form-control" name="brand_product_desc" placeholder="Mô tả danh mục...">{{ $edit_brand_product->brand_desc }}</textarea>
                                </div>
                            @endif
                            <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
