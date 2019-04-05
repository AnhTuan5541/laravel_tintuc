@extends('admin.layout.index')
@section('content')
    <!-- <link rel="stylesheet" href="css/style_admin.css"> -->
    <div class="content">
        <h1>Slide <small>Danh Sách</small></h1>
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th>id</th>
                <th>Tên</th>
                <th>Slide</th>
                <th>Sửa</th>
                <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($slide as $sl)
                <tr>
                <td>{{$sl->id}}</td>
                <td>{{$sl->Ten}}</td>
                <td><img width="500px" height ="300px"  src="upload/slide/{{$sl->TenHinh}}" alt=""></td>
                <td><a href="admin/slide/sua/{{$sl->id}}"> <span data-feather="edit"></span> Sửa</a></td>
                <td><a href="admin/slide/xoa/{{$sl->id}}"> <span data-feather="trash-2"></span> Xóa</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
            <div class="pagination justify-content-end">
                {!! $slide->links() !!}
            </div>
        </div>
    </div>
@endsection