@extends('admin.layout.index')
@section('content')
    <div class="content">
        <!-- <link rel="stylesheet" href="css/style_admin.css"> -->
        <h1>Loại Tin <small>Danh Sách</small></h1>
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
                <th>Thể Loại</th>
                <th>Sửa</th>
                <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loaitin as $lt)
                <tr>
                <td>{{$lt->id}}</td>
                <td>{{$lt->Ten}}</td>
                <td>{{$lt->TenKhongDau}}</td>
                <td>{{$lt->theloai->Ten}}</td>
                <td><a href="admin/loaitin/sua/{{$lt->id}}"> <span data-feather="edit"></span> Sửa</a></td>
                <td><a href="admin/loaitin/xoa/{{$lt->id}}"> <span data-feather="trash-2"></span> Xóa</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
            <div class="pagination justify-content-end">
                {!! $loaitin->links() !!}
            </div>
        </div>
    </div>
@endsection