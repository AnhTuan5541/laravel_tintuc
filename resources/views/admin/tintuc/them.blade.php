@extends('admin.layout.index')
@section('content')
    <!-- <link rel="stylesheet" href="css/style_admin.css"> -->
    <div class="content">
        <h1 >Tin Tức <small>Thêm</small></h1>
        <hr>
        <form action="admin/tintuc/them" method="post" class="col-md-7" enctype="multipart/form-data">
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
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
                <label>Thể loại</label>
                <select class="custom-select" name="idTheLoai" id="theloai" required>
                    <option value="">Chọn thể loại</option>
                    @foreach($theloai as $tl)
                    <option value="{{$tl->id}}" >{{$tl->Ten}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Loại tin</label>
                <select class="custom-select" name="idLoaiTin" id="loaitin" required>
                    <option value="">Chọn loại tin</option>
                    @foreach($loaitin as $lt)
                    <option value="{{$lt->id}}" >{{$lt->Ten}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tên tin tức</label>
                <input type="text" class="form-control" name="Ten" placeholder="Nhập tên tin tức"/>
            </div>
            <div class="form-group">
                <label>Tóm tắt</label>
                <textarea class="form-control ckeditor" id="cc" name="TomTat" rows ="3"></textarea>
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea class="form-control ckeditor" id="cc" name="NoiDung" rows="5"></textarea>
            </div>
            <!-- <label>Hình ảnh</label>
            <div class="input-group mb-3 form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input form-control-file" id="inputGroupFile01" name="Hinh" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01"></label>
                </div>
            </div> -->
            <div class="form-group">
                <label>Hình ảnh</label>
                <input type="file" class="form-control-file" name="file">
            </div>
            <div class="form-group">
                <label>Nổi Bật</label>
                <label class="radio-inline">
                    <input name="NoiBat" value="0" checked="" type="radio"/>Không
                </label>
                <label class="radio-inline">
                    <input name="NoiBat" value="1" type="radio"/>Có
                </label>
            </div>
            <input type="reset" class="btn btn-outline-primary" value="Reset" />
            <input type="submit" class="btn btn-outline-success"value="Thêm"/>

        </form>
    </div>
@endsection

@section('script')
    <!-- Bắt sự kiện chọn thể loại thì các loại tin của thể loại đó hiện ra -->
    <script>
        $(document).ready(function(){
            $("#theloai").change(function(){
                var idTheLoai = $(this).val();
                jQuery.get("admin/ajax/loaitin/"+idTheLoai, function(data){
                    $('#loaitin').html(data);
                });
            });
        });
    </script>
@endsection