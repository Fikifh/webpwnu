<!DOCTYPE html>
<html lang="id">
<head>
    <title>Sadesha Provinsi Jawa Barat</title>
    <meta charset="UTF-8">
    <meta name="description" content="Website Pendaftaran Beasiswa dan Pemberdayaan Sadesha Jawa Barat">
    <meta name="keywords" content="sadesha, pwnu, nu, nahdatul ulama, nkri">
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

</head>
<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header section -->
<header class="header-section clearfix">
    <a href="index.html" class="site-logo">
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
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Pages</a>
            <ul class="sub-menu">
                <li><a href="#">Category</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </li>
        <li><a href="#">News</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</header>
<!-- Header section end -->

<!-- Hero section -->
<section class="hero-section">
    <div class="hero-slider owl-carousel">
        <div class="hs-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hs-text">
                            <h2><span>Program</span> Pemberdayaan</h2>
                            <p>Provinsi juara lahir batin melalui program Sadesha dengan menyediakan satu hafidz untuk satu desa di seluruh Jabar dan mewujudkan Jabar sebagai gerbang ahli sunnah wal jamaah. </p>
                            @if(\Illuminate\Support\Facades\Auth::user())
                                @if(\App\models\scholarship\DocumentModel::where('user_id', session('id'))->first())
                                    <a href="#" class="site-btn">Anda Terdaftar</a>
                                @else
                                    <a href="{{url('register-scholarship?email='.\Illuminate\Support\Facades\Session::get('email'))}}" class="site-btn">Upload Persyaratan</a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hr-img">
                            <img src="{{ asset("bower_components/landing-page/img/landing2.jpg") }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hs-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hs-text">
                            <h2><span>Program </span> Beasiswa</h2>
                            <p>Provinsi juara lahir batin melalui program Sadesha dengan menyediakan satu hafidz untuk satu desa di seluruh Jabar dan mewujudkan Jabar sebagai gerbang ahli sunnah wal jamaah. </p>
                            @if(\Illuminate\Support\Facades\Auth::user())
                                @if(\App\models\scholarship\DocumentModel::where('user_id', session('id'))->first())
                                    <a href="#" class="site-btn">Anda Terdaftar</a>
                                @else
                                    <a href="{{url('register-scholarship?email='.\Illuminate\Support\Facades\Session::get('email'))}}" class="site-btn">Upload Persyaratan</a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hr-img">
                            <img src="{{ asset("bower_components/landing-page/img/nuconect.jpeg") }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero section end -->

<!-- Intro section -->
<section class="intro-section spad">
    <div class="container">
{{--        <div class="row">--}}
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 align="center">Jabar Juara Lahir Batin</h2>
                </div>
                <div class="col-lg-12">
                    <p align="center">Provinsi juara lahir batin melalui program Sadesha dengan menyediakan satu hafidz untuk satu desa di seluruh Jabar dan mewujudkan Jabar sebagai gerbang ahli sunnah wal jamaah.</p>
                </div>
            </div>
{{--        </div>--}}
    </div>
</section>
<!-- Intro section end -->

<!-- How section -->
<section class="how-section spad set-bg" data-setbg="img/how-to-bg.jpg">
    <div class="container text-white">
        <div class="section-title">
            <h2>Cara Mendaftar</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="how-item">
                    <div class="hi-icon">
                        <img src="{{ asset("bower_components/landing-page/img/icons/pointer.png" ) }}" alt="Isi data diri">
                    </div>
                    <h4>Buat Akun & Masuk</h4>
                    <p align="justify">Silahkan buat akun dengan cara meng klik <b>Buat Akun</b> di pojok kanan atas. Kemudan akan di redirect ke halaman masuk, dan silahkan masuk dengan cara mengisi email dan password yang sudah anda masukan pada saat buat akun
                    </p>
                </div>
            </div>
{{--            <div class="col-md-4">--}}
{{--                <div class="how-item">--}}
{{--                    <div class="hi-icon">--}}
{{--                        <img src="{{ asset("bower_components/landing-page/img/icons/pointer.png" ) }}" alt="Isi data diri">--}}
{{--                    </div>--}}
{{--                    <h4>Isi Form Data Diri</h4>--}}
{{--                    <p>Isi Form Data Diri <b>setelah klik Buat Akun</b>. </p>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-md-4">
                <div class="how-item">
                    <div class="hi-icon">
                        <img src="{{ asset("bower_components/landing-page/img/icons/pointer.png" ) }}" alt="Isi data diri">
                    </div>
                    <h4>Upload Berkas Persyaratan</h4>
                    <p>Upload Berkas Persyaran dengan cara mengklik <b>tombol Upload Persyaratan</b> wana hijau pada Slider.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- How section end -->

{{--<!-- Concept section -->--}}
{{--<section class="concept-section spad">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-6">--}}
{{--                <div class="section-title">--}}
{{--                    <h2>Our Concept & artists</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-6">--}}
{{--                <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-3 col-sm-6">--}}
{{--                <div class="concept-item">--}}
{{--                    <img src="{{ asset("/bower_components/landing-page/img/concept/1.jpg") }}" alt="">--}}
{{--                    <h5>Soul Music</h5>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-sm-6">--}}
{{--                <div class="concept-item">--}}
{{--                    <img src="{{ asset("/bower_components/landing-page/img/concept/2.jpg") }}" alt="">--}}
{{--                    <h5>Live Concerts</h5>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-sm-6">--}}
{{--                <div class="concept-item">--}}
{{--                    <img src="{{ asset("/bower_components/landing-page/img/concept/3.jpg") }}" alt="">--}}
{{--                    <h5>Dj Sets</h5>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-sm-6">--}}
{{--                <div class="concept-item">--}}
{{--                    <img src="{{ asset("/bower_components/landing-page/img/concept/4.jpg") }}" alt="">--}}
{{--                    <h5>Live Streems</h5>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<!-- Concept section end -->--}}

{{--<!-- Subscription section -->--}}
{{--<section class="subscription-section spad">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-6">--}}
{{--                <div class="sub-text">--}}
{{--                    <h2>Subscription from $15/month</h2>--}}
{{--                    <h3>Start a free trial now</h3>--}}
{{--                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}
{{--                    <a href="#" class="site-btn">Try it now</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-6">--}}
{{--                <ul class="sub-list">--}}
{{--                    <li><img src="{{ asset("/bower_components/landing-page/img/icons/check-icon.png") }}" alt="">Play any track</li>--}}
{{--                    <li><img src="{{ asset("/bower_components/landing-page/img/icons/check-icon.png") }}" alt="">Listen offline</li>--}}
{{--                    <li><img src="{{ asset("/bower_components/landing-page/img/icons/check-icon.png") }}" alt="">No ad interruptions</li>--}}
{{--                    <li><img src="{{ asset("/bower_components/landing-page/img/icons/check-icon.png") }}" alt="">Unlimited skips</li>--}}
{{--                    <li><img src="{{ asset("/bower_components/landing-page/img/icons/check-icon.png") }}" alt="">High quality audio</li>--}}
{{--                    <li><img src="{{ asset("/bower_components/landing-page/img/icons/check-icon.png") }}" alt="">Shuffle play</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<!-- Subscription section end -->--}}

{{--<!-- Premium section end -->--}}
{{--<section class="premium-section spad">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-6">--}}
{{--                <div class="section-title">--}}
{{--                    <h2>Why go Premium</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-6">--}}
{{--                <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-3 col-sm-6">--}}
{{--                <div class="premium-item">--}}
{{--                    <img src="{{ asset("/bower_components/landing-page/img/premium/1.jpg") }}" alt="">--}}
{{--                    <h4>No ad interruptions </h4>--}}
{{--                    <p>Consectetur adipiscing elit</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-sm-6">--}}
{{--                <div class="premium-item">--}}
{{--                    <img src="{{ asset("/bower_components/landing-page/img/premium/2.jpg") }}" alt="">--}}
{{--                    <h4>High Quality</h4>--}}
{{--                    <p>Ectetur adipiscing elit</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-sm-6">--}}
{{--                <div class="premium-item">--}}
{{--                    <img src="{{ asset("/bower_components/landing-page/img/premium/3.jpg") }}" alt="">--}}
{{--                    <h4>Listen Offline</h4>--}}
{{--                    <p>Sed do eiusmod tempor </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-sm-6">--}}
{{--                <div class="premium-item">--}}
{{--                    <img src="{{ asset("/bower_components/landing-page/img/premium/4.jpg") }}" alt="">--}}
{{--                    <h4>Download Music</h4>--}}
{{--                    <p>Adipiscing elit</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<!-- Premium section end -->--}}

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
                                <li><a href="">Lorem</a></li>
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

</body>
</html>
