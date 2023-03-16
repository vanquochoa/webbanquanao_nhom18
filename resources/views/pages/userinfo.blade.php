@extends('welcome')
@section('content')

<table class="table">
    <thead>
      <h1 style="text-align: center">Thông tin tài khoản</h1>
      <tr>
        
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Số điện thoại</th>
      </tr>
    </thead>
    @if(isset($user_info))
    <tbody>
      <tr>  
        <td>{{$user_info->customer_email}}</td>  
        <td>{{$user_info->customer_password}}</td>
        <td>{{$user_info->customer_phone}}</td>
      </tr>
     
      
    </tbody>
    @endif
  </table>
@endsection
