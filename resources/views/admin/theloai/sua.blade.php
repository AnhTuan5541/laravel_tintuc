@extends('admin.layout.index')
@section('content')
    <!-- <link rel="stylesheet" href="css/style_admin.css"> -->
    <div class="content">
        <h1 >Thể Loại <small>{{$theloai->Ten}}</small></h1>
        <hr>
        <form action="admin/theloai/sua/{{$theloai->id}}" method="post" class="col-md-7">
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
                <label>Tên thể loại</label>
                <input type="text" class="form-control" name="Ten" value= "{{$theloai->Ten}}" placeholder="Nhập tên thể loại">
            </div>

            <input type="reset" class="btn btn-outline-primary" value="Reset" >
            <input type="submit" class="btn btn-outline-success"value="Sửa">

        </form>
    </div>
@endsection