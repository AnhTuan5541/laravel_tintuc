@extends('admin.layout.index')
@section('content')
    <!-- <link rel="stylesheet" href="css/style_admin.css"> -->
    <div class="content">
        <h1 >Tin Tức <small>Danh Sách</small></h1>
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
        <div class="table-responsive">
            <table class="table table-striped table-bordered ">
            <thead>
                <tr>
                <th>id</th>
                <th>Tên</th>
                <th>Tên Không Dấu</th>
                <th>Loại Tin</th>
                <th>Tóm Tắt</th>
                <th>Nội Dung</th>
                <th>Nổi Bật</th>
                <th>Sửa</th>
                <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tintuc as $tt)
                <tr>
                <td>{{$tt->id}}</td>
                <td><p>{{$tt->Ten}}</p>
                    <img width="80px" src="upload/tintuc/{{$tt->TenHinh}}" alt="">
                </td>
                <td>{{$tt->TenKhongDau}}</td>
                <td>{{$tt->loaitin->Ten}}</td>
                <td>{{$tt->TomTat}}</td>
                <td>{{$tt->NoiDung}}</td>
                <td>{{$tt->NoiBat}}</td>
                <td><a href="admin/tintuc/sua/{{$tt->id}}"> <span data-feather="edit"></span> Sửa</a></td>
                <td><a href="admin/tintuc/xoa/{{$tt->id}}"> <span data-feather="trash-2"></span> Xóa</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
            <div class="pagination justify-content-end">
                {!! $tintuc->links() !!}
            </div>
        </div>
    </div>
@endsection