@extends('admin.layout.index')
@section('content')
    <!-- <link rel="stylesheet" href="css/style_admin.css"> -->
    <div class="content">
        <h1>User <small>Danh Sách</small></h1>
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
                <th>Email</th>
                <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $us)
                <tr>
                <td>{{$us->id}}</td>
                <td>{{$us->Ten}}</td>
                <td>{{$us->Email}}</td>
                <td><a href="admin/user/xoa/{{$us->id}}"> <span data-feather="trash-2"></span> Xóa</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
            <div class="pagination justify-content-end">
                {!! $user->links() !!}
            </div>
        </div>
    </div>
@endsection