@extends('admin.layout.index')
@section('content')
    <!-- <link rel="stylesheet" href="css/style_admin.css"> -->
    <div class="content">
        <h1 >Slide <small>Thêm</small></h1>
        <hr>
        <form action="admin/slide/them" method="post" class="col-md-7" enctype="multipart/form-data">
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{$err}}.</br>
                    @endforeach
                </div>
            @endif
            @if(session('thongbao'))
                <div class="alert alert-success">{{session('thongbao')}}</div>
            @endif
            @if(session('loi'))
                <div class="alert alert-danger">{{session('loi')}}</div>
            @endif
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="form-group">
                <label>Tên slide</label>
                <input type="text" class="form-control" name="Ten" placeholder="Nhập tên slide"/>
            </div>
            <div class="form-group">
                <label>Slide</label>
                <input type="file" class="form-control-file" name="file">
            </div>
            <input type="reset" class="btn btn-outline-primary" value="Reset" />
            <input type="submit" class="btn btn-outline-success"value="Thêm"/>
        </form>
    </div>
@endsection

