@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục sản phẩm
                </header>
                <div class="panel-body">
                    @if (isset($message_info))
                        <span style="color: red; font-weight: bold" class="text">{{ $message_info }}</span>
                        {{ Session::put('message_info', null) }}
                    @else
                        <span></span>
                    @endif
                    <div class="position-center">
                        @if (isset($edit_category_product))
                        <form role="form" action="{{ URL::to('/update-category-product/'.$edit_category_product->category_id) }}" method="POST">
                            {{ csrf_field() }}
                            
                                <div class="form-group">
                                    <label>Tên danh mục</label>

                                    <input name="category_product_name" value="{{$edit_category_product->category_name}}" type="text" class="form-control"
                                        placeholder="tên danh mục">
                                </div>
                                <div class="form-group">

                                    <label>Mô tả</label>
                                    <textarea class="form-control" name="category_product_desc" placeholder="Mô tả danh mục...">{{ $edit_category_product->category_desc }}</textarea>
                                </div>
                            @endif



                            <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
