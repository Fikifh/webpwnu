<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Icons font CSS-->
    <link href="{{ asset("/bower_components/colorlib-regform/vendor/mdi-font/css/material-design-iconic-font.min.css") }}" rel="stylesheet" media="all">
    <link href="{{ asset("/bower_components/colorlib-regform/vendor/font-awesome-4.7/css/font-awesome.min.css") }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset("/bower_components/colorlib-regform/vendor/select2/select2.min.css") }}" rel="stylesheet" media="all">
    <link href="{{ asset("/bower_components/colorlib-regform/vendor/datepicker/daterangepicker.css") }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset("/bower_components/colorlib-regform/css/main.css") }}" rel="stylesheet" media="all">



    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon"/>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset("/bower_components/landing-page/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("/bower_components/landing-page/css/font-awesome.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("/bower_components/landing-page/css/owl.carousel.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("/bower_components/landing-page/css/slicknav.min.css") }}"/>

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="{{ asset("/bower_components/landing-page/css/style.css") }}"/>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header section -->
<header class="header-section clearfix">
    <a href="{{url('/')}}" class="site-logo">
        <img id="header-logo" src="{{ asset("/bower_components/landing-page/img/pwnulogo.jpg") }}" alt="">
    </a>
    <div class="header-right">
        <a href="#" class="hr-btn">Help</a>
        <span>|</span>
        @if(\Illuminate\Support\Facades\Auth::user())
            <div class="user-panel">
                <a href="" class="login">{{\Illuminate\Support\Facades\Session::get('name')}}</a>
                <a href="{{url('logout')}}">Logout</a>
            </div>
        @else
            <div class="user-panel">
                <a href="{{url('login')}}" class="login">Masuk</a>
                <a href="{{url('register')}}" class="register">Buat Akun</a>
            </div>
        @endif
    </div>
    <ul class="main-menu">
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Pages</a>
            <ul class="sub-menu">
                <li><a href="category.html">Category</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </li>
        <li><a href="blog.html">News</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
</header>
<!-- Header section end -->

<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
    <div class="wrapper wrapper--w780">
        <div class="card card-3">
            <div class="card-headings" style="margin-top: 100px">
                <span style="margin-top: 20px"><h5 align="center"><b style="margin-top: 20px">Membuat Akun</b></h5></span>
            </div>
            <div class="card-body">
                <h2 class="title">Buat Akun</h2>
                @if(\Session::has('alert'))
                    <div class="alert alert-danger">
                        <div>{{Session::get('alert')}}</div>
                    </div>
                @endif
                @if(\Session::has('alert-success'))
                    <div class="alert alert-success">
                        <div>{{Session::get('alert-success')}}</div>
                    </div>
                @endif
                <form action="{{ url('register-user') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input required="true" class="form-control" type="email" placeholder="Email" name="email">
                    </div>
                    <div class="input-group">
                        <input required="true" class="form-control" type="password" placeholder="Password" name="password" id="txtPassword">
                    </div>
                    <div class="input-group">
                        <input required="true" class="form-control" type="password" placeholder="Konfirmasi Password" name="confirmation" id="txtConfirmPassword">
                    </div>
                    <div class="input-group">
                        <input required="true" class="form-control" type="text" placeholder="Nama Lengkap" name="name">
                    </div>
                    <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                            <label class="form-group">Jenis Kelamin : </label>
                            <select name="gender">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <div class="select-dropdown"></div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input required="true" class="form-control" type="number" placeholder="Nomor Hp" name="phone">
                    </div>
                    <div class="input-group">
                        <input required="true" class="form-control" type="text" placeholder="Tempat Lahir" name="birth_place">
                    </div>
                    <div class="input-group">
                        <label class="form-group">Tanggal Lahir : </label>
                        <input required="true" class="form-control" type="date" placeholder="Tanggal Lahir" name="birth_day">
                    </div>
                    <div class="input-group">
                        <input required="true" class="form-control" type="number" placeholder="Usia" name="age">
                    </div>
                    <div class="input-group">
                        <input required="true" class="form-control" type="text" placeholder="Ibu Kandung" name="birth_mother">
                    </div>
                    <div class="input-group">
                        <input required="true" class="form-control" type="text" placeholder="Kota / Kabupaten" name="district">
                    </div>
                    <div class="input-group">
                        <input required="true" class="form-control" type="text" placeholder="Alamat sesuai KTP" name="ktp_address">
                    </div>
                    <div class="input-group">
                        <input required="true" class="form-control" type="text" placeholder="Alamat Sekarang" name="address">
                    </div>
                    <div class="p-t-10">
                        <button class="btn btn--pill btn--green" type="submit" id="btnSubmit">Buat Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Jquery JS-->
<script src="{{ asset("/bower_components/colorlib-regform/vendor/jquery/jquery.min.js") }}"></script>
<!-- Vendor JS-->
<script src="{{ asset("/bower_components/colorlib-regform/vendor/select2/select2.min.js") }}></script>
<script src="{{ asset("/bower_components/colorlib-regform/vendor/datepicker/moment.min.js") }}></script>
<script src="{{ asset("/bower_components/colorlib-regform/vendor/datepicker/daterangepicker.js") }}></script>

<!-- Main JS-->
<script src="{{ asset("/bower_components/colorlib-regform/js/global.js") }}></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>
<!-- Footer section end -->

<!--====== Javascripts & Jquery ======-->
<script src="{{ asset("/bower_components/landing-page/js/jquery-3.2.1.min.js") }}"></script>
<script src="{{ asset("/bower_components/landing-page/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("/bower_components/landing-page/js/jquery.slicknav.min.js") }}"></script>
<script src="{{ asset("/bower_components/landing-page/js/owl.carousel.min.js") }}"></script>
<script src="{{ asset("/bower_components/landing-page/js/mixitup.min.js") }}"></script>
<script src="{{ asset("/bower_components/landing-page/js/main.js") }}"></script>

</html>
<!-- end document-->
