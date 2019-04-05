@extends('admin.layout.index')
@section('content')
    <!-- <link rel="stylesheet" href="css/style_admin.css"> -->
    <div class="content">
        <h1 >Admin <small>{{$admin->Ten}}</small></h1>
        <hr>
        <form action="admin/admin_acc/sua/{{$admin->id}}" method="post" class="col-md-7">
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                    @endforeach
                </div>
            @endif
            @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
            @if(session('loi'))
            <div class="alert alert-danger">
                {{session('loi')}}
            </div>
            @endif

            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group row">
                <label class="col-md-4 col-form-label">Tên</label>
                <input type="text" class="form-control-plaintext col-md-8" style="color: rgb(240, 38, 72);" name="Ten" value="{{$admin->Ten}}" readonly>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">Tài khoản</label>
                <input type="email" class="form-control-plaintext col-md-8" style="color: rgb(240, 38, 72);" name="TaiKhoan" value="{{$admin->TaiKhoan}}" readonly>
            </div>
            <div class="form-group row">
                <!-- <input type="checkbox" name="doiMatKhau" id="doiMatKhau"> -->
                <label class="col-md-4 col-form-label">Mật khẩu cũ</label>
                <input type="password" class="form-control MatKhau col-md-8" name="MatKhauCu" placeholder="Mật khẩu cũ" >
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">Mật khẩu mới</label>
                <input type="password" class="form-control MatKhau col-md-8"  name="MatKhauMoi" placeholder="Mật khẩu mới" >
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">Nhập lại mật khẩu</label>
                <input type="password" class="form-control MatKhau col-md-8"  name="NhapLaiMatKhau" placeholder="Nhập lại mật khẩu" >
            </div>
            <input type="reset" class="btn btn-outline-primary" value="Reset" >
            <input type="submit" class="btn btn-outline-success"value="Đổi">
        </form>
    </div>
@endsection
<!-- Hàm checkbox check để đổi mật khẩu -->
<!-- @section('script')
    <script>
        $(document).ready(function(){
            $('#doiMatKhau').change(function(){
                if($(this).is(':checked')){
                    $('.MatKhau').removeAttr('disabled');
                }
                else{
                    $('.MatKhau').attr('disabled','');
                }
            });
        });
    </script>
@endsection -->