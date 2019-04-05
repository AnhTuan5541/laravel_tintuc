@extends('admin.layout.index')
@section('content')
    <!-- <link rel="stylesheet" href="css/style_admin.css"> -->
    <div class="content">
        <h1>Thể Loại <small>Danh Sách</small></h1>
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
                <th>Tên Không Dấu</th>
                <th>Sửa</th>
                <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($theloai as $tl)
                <tr>
                <td>{{$tl->id}}</td>
                <td>{{$tl->Ten}}</td>
                <td>{{$tl->TenKhongDau}}</td>
                <td><a href="admin/theloai/sua/{{$tl->id}}"> <span data-feather="edit"></span> Sửa</a></td>
                <td><a href="admin/theloai/xoa/{{$tl->id}}"> <span data-feather="trash-2"></span> Xóa</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
            <div class="pagination justify-content-end">
                {!! $theloai->links() !!}
            </div>
        </div>
    </div>
@endsection