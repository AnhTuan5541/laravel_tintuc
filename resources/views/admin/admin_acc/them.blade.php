@extends('admin.layout.index')
@section('content')
    <!-- <link rel="stylesheet" href="css/style_admin.css"> -->
    <div class="content">
        <h1 >Admin <small>Thêm</small></h1>
        <hr>
        <form action="admin/admin_acc/them" method="post" class="col-md-7">
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                    @endforeach
                </div>
            @endif
            @if(session('loi'))
            <div class="alert alert-danger">
                {{session('loi')}}
            </div>
            @endif
            @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif

            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label>Tài khoản</label>
                <input type="text" class="form-control" name="TaiKhoan" placeholder="Nhập tài khoản">
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" class="form-control" name="MatKhau" placeholder="Password">
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu</label>
                <input type="password" class="form-control"  name="NhapLaiMatKhau" placeholder="Nhập lại mật khẩu">
            </div>
            <input type="reset" class="btn btn-outline-primary" value="Reset" >
            <input type="submit" class="btn btn-outline-success"value="Thêm">
        </form>
    </div>
@endsection