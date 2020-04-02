<!DOCTYPE html>
<html lang="id">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="description" content="Website Resmi PWJQHNU Jawa Barat">
    <meta name="keywords" content="pwjqhnu, pcjqhnu, sadesha, pwnu, nu, nahdatul ulama, nkri">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="{{ asset("/bower_components/landing-page/img/pwnulogo.jpg") }}" rel="shortcut icon"/>

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

    @yield('style')

</head>
<body onload="checkAlert({{Session::get('alert')}})">
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header section -->
<header class="header-section clearfix">
    <a href="{{url("/")}}" class="site-logo">
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
        <li><a href="{{url("/")}}">Beranda</a></li>
        <li><a href="{{url("artikel/Profil-PWJQHNU")}}">Profil</a></li>
        <li><a href="{{url("organisasi")}}">Organisasi</a>
            <ul class="sub-menu">
                <li><a href="{{url("pwjqhnu")}}">PWJQHNU</a></li>
                <li><a href="{{url("pcjqhnu")}}">PCJQHNU</a></li>
            </ul>
        </li>
        <li><a href="{{url("keislaman")}}">Keislaman</a></li>
        <li><a href="{{url("downloads")}}">Download PDF</a></li>
        <li><a href="{{url("sadesha")}}">Sadesha</a>
            <ul class="sub-menu">
                <li><a href="{{url("pwjqhnu")}}">PWJQHNU</a></li>
                <li><a href="{{url("pcjqhnu")}}">PCJQHNU</a></li>
            </ul>
        </li>
        <li><a href="{{url("donasi-program")}}">Donasi Program</a></li>
    </ul>
</header>
<!-- Header section end -->
    @yield('content')
<!-- Hero section end -->
<!-- Intro section -->
<section class="intro-section spad" style="background-color: ghostwhite">
    <div class="container">
        {{--        <div class="row">--}}
        <div class="col-lg-12">
            <div class="section-title">
                <h2 align="center">Jabar Juara Lahir Batin</h2>
            </div>
            <div class="col-lg-12">
                <p align="center">Provinsi juara lahir batin melalui program Sadesha dengan menyediakan satu hafidz untuk satu desa di seluruh Jabar.</p>
            </div>
        </div>
        {{--        </div>--}}
    </div>
</section>
<!-- Intro section end -->

<!-- Footer section -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-7 order-lg-2">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="footer-widget">
                            <h2>About us</h2>
                            <ul>
                                <li><a href="">Our Story</a></li>
                                <li><a href="">History</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="footer-widget">
                            <h2>Products</h2>
                            <ul>
                                <li><a href="">Subscription</a></li>
                                <li><a href="">Footage</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="footer-widget">
                            <h2>Playlists</h2>
                            <ul>
                                <li><a href="">Newsletter</a></li>
                                <li><a href="">Careers</a></li>
                                <li><a href="">Press</a></li>
                                <li><a href="">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 order-lg-1">
                <img id="footer-logo" src="{{ asset("/bower_components/landing-page/img/pwnulogo.jpg") }}" alt="">
                <div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | SADESHA
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                <div class="social-links">
                    <a href=""><i class="fa fa-instagram"></i></a>
                    <a href=""><i class="fa fa-pinterest"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer section end -->

<!--====== Javascripts & Jquery ======-->
<script src="{{ asset("/bower_components/landing-page/js/jquery-3.2.1.min.js") }}"></script>
<script src="{{ asset("/bower_components/landing-page/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("/bower_components/landing-page/js/jquery.slicknav.min.js") }}"></script>
<script src="{{ asset("/bower_components/landing-page/js/owl.carousel.min.js") }}"></script>
<script src="{{ asset("/bower_components/landing-page/js/mixitup.min.js") }}"></script>
<script src="{{ asset("/bower_components/landing-page/js/main.js") }}"></script>
@yield('script')
</body>
</html>
