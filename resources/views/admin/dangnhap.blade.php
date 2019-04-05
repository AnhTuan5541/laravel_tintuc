<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <base href="{{asset('')}}">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dangnhap.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin " action="dangnhap/admin" method="post">
        @if(session('loi'))
            <div class="alert alert-danger">{{session('loi')}}</div>
        @endif
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <h1 class="h3 mb-3 font-weight-normal">Đăng Nhập</h1>
        <label for="inputTaiKhoan" class="sr-only">Tài Khoản</label>
        <input type="text" id="inputTaiKhoan" name="TaiKhoan" class="form-control" placeholder="Tài khoản" required autofocus>
        <label for="inputPassword" class="sr-only">Mật Khẩu</label>
        <input type="password" id="inputPassword" name="MatKhau" class="form-control" placeholder="Mật khẩu" required>
        <div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; Tuan Nguyen</p>
    </form>
  </body>
</html>
