@extends('admin.layout.index')
@section('content')
    <!-- <link rel="stylesheet" href="css/style_admin.css"> -->
    <div class="content">
        <h1>Admin <small>Danh Sách</small></h1>
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
                <th>Tài Khoản</th>
                <th>Đổi Mật Khẩu</th>
                <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admin as $ad)
                <tr>
                <td>{{$ad->id}}</td>
                <td>{{$ad->Ten}}</td>
                <td>{{$ad->TaiKhoan}}</td>
                <td><a href="admin/admin_acc/sua/{{$ad->id}}"
                    onclick = "return $ad->Ten=''"
                > <span data-feather="edit"></span> Đổi</a></td>
                <td><a href="admin/admin_acc/xoa/{{$ad->id}}"> <span data-feather="trash-2"></span> Xóa</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
            <div class="pagination justify-content-end">
                {!! $admin->links() !!}
            </div>
        </div>
    </div>
@endsection