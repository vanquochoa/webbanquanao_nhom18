@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
                </header>
                <div class="panel-body">
                    @if (isset($message_info))
                        <span style="color: red; font-weight: bold" class="text">{{ $message_info }}</span>
                        {{ Session::put('message_info', null) }}
                    @else
                        <span></span>
                    @endif


                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/save-category-product') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input name="category_product_name" type="text" class="form-control"
                                    placeholder="tên danh mục">
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="category_product_desc" placeholder="Mô tả danh mục..."></textarea>

                            </div>
                            <div class="form-group">
                                <label for="">Hiển thị</label>
                                <select name="category_product_status" class="form-control input-sm m-bot15">
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
