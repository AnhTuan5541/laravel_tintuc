<nav class="col-md-2 d-none d-md-block bg-light bg-info sidebar navbar navbar-toggleable-sm "  role="navigation">
    <button class="navbar-toggler" data-toggle="collapse" data-target="#menuNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="sidebar-sticky navbar-collapse" id="menuNav">
        <ul class="nav flex-column navbar-nav mr-auto" >
            <li class="nav-item">

                <div data-toggle="collapse" data-target="#collapseTheLoai" aria-expanded="false" aria-controls="collapseTheLoai">
                    <a class="nav-link " href="#" onclick='return false'> <span data-feather="book"></span> Thể Loại<span class="sr-only">(current)</span></a>
                </div>
                <div class="collapse" id="collapseTheLoai" style="text-indent: 30px;">
                    <a class="nav-link"  href="admin/theloai/danhsach"> Danh Sách</a>
                    <a class="nav-link"  href="admin/theloai/them"> Thêm</a>
                </div>
            </li>
            <li class="nav-item">
                <div data-toggle="collapse" data-target="#collapseLoaiTin" aria-expanded="false" aria-controls="collapseLoaiTin">
                    <a class="nav-link" href="#" onclick='return false'> <span data-feather="book-open"></span> Loại Tin</a>
                </div>
                <div class="collapse" id="collapseLoaiTin" style="text-indent: 30px;">
                    <a class="nav-link" href="admin/loaitin/danhsach">Danh Sách</a>
                    <a class="nav-link" href="admin/loaitin/them">Thêm</a>
                </div>
            </li>
            <li class="nav-item">
                <div data-toggle="collapse" data-target="#collapseTinTuc" aria-expanded="false" aria-controls="collapseTinTuc">
                    <a class="nav-link" href="#" onclick='return false'> <span data-feather="file-text"></span> Tin Tức</a>
                </div>
                <div class="collapse" id="collapseTinTuc" style="text-indent: 30px;">
                    <a class="nav-link" href="admin/tintuc/danhsach">Danh Sách</a>
                    <a class="nav-link" href="admin/tintuc/them">Thêm</a>
                </div>
            </li>
            <li class="nav-item">
                <div data-toggle="collapse" data-target="#collapseSlide" aria-expanded="false" aria-controls="collapseSlide">
                    <a class="nav-link" href="#" onclick='return false'> <span data-feather="camera"></span> Slide</a>
                </div>
                <div class="collapse" id="collapseSlide" style="text-indent: 30px;">
                    <a class="nav-link" href="admin/slide/danhsach">Danh Sách</a>
                    <a class="nav-link" href="admin/slide/them">Thêm</a>
                </div>
            </li>
            <li class="nav-item">
                <div data-toggle="collapse" data-target="#collapseUser" aria-expanded="false" aria-controls="collapseUser">
                    <a class="nav-link" href="#" onclick='return false'> <span data-feather="user"></span> User</a>
                </div>
                <div class="collapse" id="collapseUser" style="text-indent: 30px;">
                    <a class="nav-link" href="admin/user/danhsach">Danh Sách</a>
                </div>
            </li>
            <li class="nav-item">
                <div data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="false" aria-controls="collapseAdmin">
                    <a class="nav-link" href="#" onclick='return false'> <span data-feather="server"></span> Admin</a>
                </div>
                <div class="collapse" id="collapseAdmin" style="text-indent: 30px;">
                    <a class="nav-link" href="admin/admin_acc/danhsach">Danh Sách</a>
                    <a class="nav-link" href="admin/admin_acc/them">Thêm</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
