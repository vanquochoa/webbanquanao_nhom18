@extends('admin_layout')
@section('admin_content')
    <style>
        span.fa.fa-thumbs-up {
            color: blue;
            font-size: 16px;
        }

        span.fa.fa-thumbs-down {
            color: red;
            font-size: 16px;
        }
    </style>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách sản phẩm
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">

                <table class="table table-striped b-t b-light">
                    @if (isset($capnhat))
                        <span style="color: red; font-weight:bold">{{ $capnhat }}</span>
                        {{ Session::put('capnhat', null) }}
                    @else
                        <span></span>
                    @endif
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Hình ảnh</th>
                            <th>Danh mục</th>  
                            <th>Thương hiệu</th>          
                            <th>Hiển thị</th>

                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($all_product as $item)
                            <tr>
                                <td>{{ $item->product_name}}</td>
                                <td>{{ $item->product_price}}</td>
                                <td><img src="public/uploads/product/{{ $item->product_image}}" alt="" height="100" width="100"> </td>
                                <td>{{ $item->category_name}}</td>
                                <td>{{ $item->brand_name}}</td>
                                
                                @if ($item->product_status == 0)
                                    <td><a href="{{ URL::to('/unactive-product/' . $item->product_id) }}"><span
                                                class="fa fa-thumbs-down"> Ẩn</span></a></td>
                                @else
                                    <td>
                                        <a href="{{ URL::to('/active-product/' . $item->product_id) }}"><span
                                                class="fa fa-thumbs-up"> Hiện</span></a>
                                    </td>
                                @endif
                                <td>
                                    <a href="{{ URL::to('/edit-product/' . $item->product_id) }}"
                                         class="active"
                                        ui-toggle-class=""><i class="fa fa-pencil text-success text-active"></i></a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ URL::to('/delete-product/'.$item->product_id) }}"><i
                                            class="fa fa-times text-danger text"></i></a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
