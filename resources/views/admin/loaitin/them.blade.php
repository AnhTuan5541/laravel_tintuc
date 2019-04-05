@extends('admin.layout.index')
@section('content')
    <div class="content">
        <!-- <link rel="stylesheet" href="css/style_admin.css"> -->
        <h1 >Loại Tin <small>Thêm</small></h1>
        <hr>
        <form action="admin/loaitin/them" method="post" class="col-md-7">
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{$err}}
                    @endforeach
                </div>
            @endif
            @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif

            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label>Thể loại</label>
                <select class="custom-select" name="idTheLoai" required>
                @foreach($theloai as $tl)
                <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tên loại tin</label>
                <input type="text" class="form-control" name="Ten" placeholder="Nhập tên loại tin">
            </div>
            <input type="reset" class="btn btn-outline-primary" value="Reset" >
            <input type="submit" class="btn btn-outline-success"value="Thêm">

        </form>
    </div>
@endsection