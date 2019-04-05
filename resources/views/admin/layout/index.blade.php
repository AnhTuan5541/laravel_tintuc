<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <base href="{{asset('')}}">
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <link rel="stylesheet" href="css/style_admin.css">
                <script src="ckeditor5-build-classic/ckeditor.js"></script>
<script src="ckeditor/ckeditor.js"></script>
        <title>Admin</title>
    </head>
    <body>
        @include('admin.layout.header')
        <div class="container-fluid">
        <div class="row">
            @include('admin.layout.menu')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @yield('content')
            </main>
        </div>
        </div>
        @include('admin.layout.footer')
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>

        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <script>
        feather.replace()
        </script>
        <script src="ckeditor5-build-classic/ckeditor.js"></script>
        <script src="ckeditor/ckeditor.js"></script>
        <script>
            //CKEDITOR.replace('.ckeditor');
        </script>
        @yield('script')
    </body>
</html>