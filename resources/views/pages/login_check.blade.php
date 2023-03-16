@extends('welcome')
@section('content')

    <section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Đăng nhập</h2>
                        <form action="{{ URL::to('/login') }}" method="POST">
                            @if ($errors->loginErrors->first())
                                <div class="error_message panel panel-danger">
                                    <div class="panel-heading">Vui lòng kiểm tra lỗi</div>
                                    @foreach ($errors->loginErrors->all() as $error)
                                        <div class="panel-body item_message text-danger">{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
                            {{ csrf_field() }}

                            <input type="email" name="email" placeholder="Email" required
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Vui lòng nhập đúng định dạng email">
                            <input type="password" name="pass" placeholder="Mật khẩu" required />
                            <span>
                                <input type="checkbox" class="checkbox">
                                Ghi nhớ mật khẩu
                            </span>
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">Hoặc</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>Đăng ký tài khoản</h2>
                        <form action="{{ URL::to('/add-customer') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="email"name="customer_email" placeholder="Email" required
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                title="Vui lòng nhập đúng định dạng email" />
                            <input type="password" name="customer_pass" placeholder="Mật khẩu" required />

                            <input type="text" name="customer_name" placeholder="Họ và tên" required />

                            <input type="text" name="customer_phone" placeholder="Số điện thoại" />
                            <button type="submit" class="btn btn-default">Đăng ký</button>
                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
    <!--/form-->
@endsection
