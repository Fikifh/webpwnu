<!DOCTYPE html>
<html lang="id">
<head>
    <title>Sadesha Provinsi Jawa Barat</title>
    <meta charset="UTF-8">
    <meta name="description" content="Website Pendaftaran Beasiswa dan Pemberdayaan Sadesha PWNU Jawa Barat">
    <meta name="keywords" content="sadesha, pwnu, nu, nahdatul ulama, nkri">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="{{ asset("/bower_components/landing-page/img/pwnulogo.jpg") }}" rel="shortcut icon"/>

    <!-- Icons font CSS-->
    <link href="{{ asset("bower_components/regform/vendor/mdi-font/css/material-design-iconic-font.min.css") }}"
          rel="stylesheet" media="all">
    <link href="{{ asset("bower_components/regform/vendor/font-awesome-4.7/css/font-awesome.min.css") }}"
          rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
          rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset("bower_components/regform/vendor/select2/select2.min.css") }}" rel="stylesheet" media="all">
    <link href="{{ asset("bower_components/regform/vendor/datepicker/daterangepicker.css") }}" rel="stylesheet"
          media="all">

    <!-- Main CSS-->
    <link href="{{ asset("bower_components/regform/css/main.css") }}" rel="stylesheet" media="all">

    <!--header -->
    <!-- Google font -->
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap"
        rel="stylesheet">

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

    <!--end header -->
    <!-- start form2 -->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

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

<!-- start form-->
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
            <p>Selamat datang ! Silahkan lakukan pendaftaran dengan teliti.</p>
{{--            <input type="submit" name="" value="Login"/><br/>--}}
        </div>

        <div class="col-md-9 register-right">
            <p class="col-sm-12 float-lg-right"
               style="    text-align: right; padding-right: 10px; margin-bottom: 0px; margin-top: 0px;padding-top: 20px;">
                <b>: Pilih Jenis SADESHA</b></p>
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                       aria-controls="home" aria-selected="true">Pemberdayaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                       aria-controls="profile" aria-selected="false">Beasiswa</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Daftar Pemberdayaan</h3>
                    {{--                    <div class="row register-form">--}}
                    <form class="row register-form col-lg-12" method="POST" action="{{url('register-empowerment')}}"
                          enctype="multipart/form-data">
                        <input class="form-control" hidden="true" type="text" name="id" value="{{$user->id}}">
                        {{csrf_field()}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Nama Lengkap" disabled
                                       name="nama" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <input required class="form-control" type="number" name="nik"
                                       placeholder="Nomor Induk Kependudukan (NIK)" value="{{$user->nik}}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Pilih Pendidikan</label>
                                <select class="form-control" name="education">
                                    <option value="Terakhir (Pemberdayaan)">Terakhir (Pemberdayaan)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Jumlah Hafalan</label>
                                <select class="form-control" name="jumlah_hafalan">
                                    @for($i=1; $i <= 30; $i++)
                                        <option value="{{$i}}">{{$i}} Juz</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Scan KTP</label>
                                <input required class="form-control-file" type="file" placeholder="Scan KTP" name="ktp">
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Scan Ijazah Terakhir</label>
                                <input required class="form-control-file" type="file" placeholder="Scan Ijazah Terakhir"
                                       name="ijazah">
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Scan Kartu Keluarga</label>
                                <input required class="form-control-file" type="file" placeholder="Scan Kartu Keluarga"
                                       name="kk">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Scan Surat Rekomendasi dari
                                    Desa</label>
                                <input required class="form-control-file" type="file"
                                       placeholder="Scan Surat Rekomendasi dari Desa" name="surdes">
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Scan Surat Rekomendasi Ormas</label>
                                <input required class="form-control-file" type="file"
                                       placeholder="Scan Surat Rekomendasi Ormas" name="suror">
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Scan Bukti Hafalan (Syahadah)</label>
                                <input required class="form-control-file" type="file"
                                       placeholder="Scan Bukti Hafalan (Syahadah)" name="bukti_hafalan">
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Scan SKCK</label>
                                <input required class="form-control-file" type="file"
                                       placeholder="Scan Bukti Hafalan (Syahadah)" name="skck">
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Scan Curriculum Vitae (CV)</label>
                                <input required class="form-control-file" type="file"
                                       placeholder="Scan Curriculum Vitae (CV)" name="cv">
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Foto ukuran 3 x 4</label>
                                <input required class="form-control-file" type="file" placeholder="Foto ukuran 3 x 4"
                                       name="foto">
                            </div>
                            <input type="submit" class="btnRegister" value="Upload Persyaratan"/>
                        </div>
                    </form>
                    {{--                    </div>--}}
                </div>
                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h3 class="register-heading">Apply as a Hirer</h3>
                    {{--                    <div class="row register-form">--}}
                    <form class="row register-form col-lg-12" method="POST" action="{{url('register-scholarship')}}"
                          enctype="multipart/form-data">
                        <input class="form-control" hidden="true" type="text" name="id" value="{{$user->id}}">
                        {{csrf_field()}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Nama Lengkap" disabled
                                       name="nama" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <input required class="form-control" type="number" name="nik"
                                       placeholder="Nomor Induk Kependudukan (NIK)" value="{{$user->nik}}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Pendidikan yang sedang Ditempuh</label>
                                <input required class="form-control" type="text" name="school_name"
                                       placeholder="Nama Sekolah / Pondok Pesantren">
                                <input minlength="1" maxlength="12" required class="form-control" type="number" name="school_class"
                                       placeholder="Tingkan / Kelas (Angka)">
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Jumlah Hafalan</label>
                                <select class="form-control" name="jumlah_hafalan">
                                    @for($i=1; $i <= 30; $i++)
                                        <option value="{{$i}}">{{$i}} Juz</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Scan KTP</label>
                                <input required class="form-control-file" type="file" placeholder="Scan KTP" name="ktp">
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Scan Ijazah Terakhir</label>
                                <input required class="form-control-file" type="file" placeholder="Scan Ijazah Terakhir"
                                       name="ijazah">
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Scan Kartu Keluarga</label>
                                <input required class="form-control-file" type="file" placeholder="Scan Kartu Keluarga"
                                       name="kk">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Scan Surat Rekomendasi dari
                                    Desa</label>
                                <input required class="form-control-file" type="file"
                                       placeholder="Scan Surat Rekomendasi dari Desa" name="surdes">
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Scan Surat Rekomendasi Ormas</label>
                                <input required class="form-control-file" type="file"
                                       placeholder="Scan Surat Rekomendasi Ormas" name="suror">
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Scan Surat Keterangan Jumlah Hafalan</label>
                                <input required class="form-control-file" type="file"
                                       placeholder="Scan Surat Keterangan Jumlah Hafalan" name="sur_ket_hafalan">
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Scan SKCK</label>
                                <input required class="form-control-file" type="file"
                                       placeholder="Scan Bukti Hafalan (Syahadah)" name="skck">
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Scan Curriculum Vitae (CV)</label>
                                <input required class="form-control-file" type="file"
                                       placeholder="Scan Curriculum Vitae (CV)" name="cv">
                            </div>
                            <div class="form-group">
                                <label class="form-control-file font-weight-bold">Foto ukuran 3 x 4</label>
                                <input required class="form-control-file" type="file" placeholder="Foto ukuran 3 x 4"
                                       name="foto">
                            </div>
                            <input type="submit" class="btnRegister" value="Upload Persyaratan"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end form-->


{{--<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">--}}
{{--    <div class="wrapper wrapper--w790">--}}
{{--        <div class="card card-5">--}}
{{--            <div class="card-heading">--}}
{{--                <a href="{{url('/')}}">--}}
{{--                    <button class="fa  fa-home zmdi-invert-colors" style="margin-left: 30px; margin-top: 30px" >Home</button>--}}
{{--                </a>--}}
{{--                <h2 class="title">Pendaftaran Beasiswa PWNU</h2>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <form method="POST" action="{{url('register-scholarship')}}" enctype="multipart/form-data">--}}
{{--                    {{csrf_field()}}--}}
{{--                    <div class="form-row m-b-55">--}}
{{--                        <input class="input--style-5" hidden="true" type="text" name="id" value="{{$user->id}}">--}}
{{--                        <div class="name">Nama Lengkap</div>--}}
{{--                        <div class="input-group-desc">--}}
{{--                            <input class="input--style-5" type="text" disabled name="nama" value="{{$user->name}}">--}}
{{--                            <label class="label--desc">nama lengkap</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row">--}}
{{--                        <div class="name">NIK</div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group">--}}
{{--                                <input required class="input--style-5" type="number" name="nik">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row">--}}
{{--                        <div class="name">Pendidikan</div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group">--}}
{{--                                <input required class="input--style-5" type="text" name="education">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row m-b-55">--}}
{{--                        <div class="name">Jumlah Hafalan Zuz</div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group-desc">--}}
{{--                                <input required class="input--style-5" type="number" name="jumlah_hafalan">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row m-b-55">--}}
{{--                        <div class="name">KTP</div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group-desc">--}}
{{--                                <input required class="input--style-5" type="file" name="ktp">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row m-b-55">--}}
{{--                        <div class="name">Ijazah</div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group-desc">--}}
{{--                                <input required class="input--style-5" type="file" name="ijazah">--}}
{{--                                <label class="label--desc">untuk pemberdayaan</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row m-b-55">--}}
{{--                        <div class="name">Kartu Keluarga</div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group-desc">--}}
{{--                                <input required class="input--style-5" type="file" name="kk">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row m-b-55">--}}
{{--                        <div class="name">Surat Rekomendasi dari Desa</div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group-desc">--}}
{{--                                <input required class="input--style-5" type="file" name="surdes">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row m-b-55">--}}
{{--                        <div class="name">Surat Rekomendasi Ormas</div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group-desc">--}}
{{--                                <input required class="input--style-5" type="file" name="suror">--}}
{{--                                <label class="label--desc">surat rekomendasi dari ormas atau PC JQH</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row m-b-55">--}}
{{--                        <div class="name">Bukti Hafalan</div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group-desc">--}}
{{--                                <input required class="input--style-5" type="file" name="bukti_hafalan">--}}
{{--                                <label class="label--desc">Scan Bukti Hafalan</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row m-b-55">--}}
{{--                        <div class="name">SKCK</div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group-desc">--}}
{{--                                <input required class="input--style-5" type="file" name="skck">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row m-b-55">--}}
{{--                        <div class="name">Surat Keterangan Jumlah Hafalan</div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group-desc">--}}
{{--                                <input required class="input--style-5" type="file" name="sur_ket_hafalan">--}}
{{--                                <label class="label--desc">Scan Surat Keterangan Hafalan</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row m-b-55">--}}
{{--                        <div class="name">Syahadah</div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group-desc">--}}
{{--                                <input required class="input--style-5" type="file" name="syahadah">--}}
{{--                                <label class="label--desc">syahadah untuk pemberdayaan</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row m-b-55">--}}
{{--                        <div class="name">CV</div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group-desc">--}}
{{--                                <input required class="input--style-5" type="file" name="cv">--}}
{{--                                <label class="label--desc">Curriculum Vitae</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-row m-b-55">--}}
{{--                        <div class="name">Foto 3x4</div>--}}
{{--                        <div class="value">--}}
{{--                            <div class="input-group-desc">--}}
{{--                                <input required class="input--style-5" type="file" name="foto">--}}
{{--                                <label class="label--desc">foto ukuran 3x4</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <button class="btn btn--radius-2 btn--red" type="submit">Upload</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}



<!-- Jquery JS-->
<script src="{{ asset("bower_components/regform/vendor/jquery/jquery.min.js") }}"></script>
<!-- Vendor JS-->
<script src="{{ asset("bower_components/regform/vendor/select2/select2.min.js") }}"></script>
<script src="{{ asset("bower_components/regform/vendor/datepicker/moment.min.js") }}"></script>
<script src="{{ asset("bower_components/regform/vendor/datepicker/daterangepicker.js") }}"></script>

<!-- Main JS-->
<script src="{{ asset("bower_components/regform/js/global.js") }}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

<!-- Footer section end -->

<!--====== Javascripts & Jquery ======-->
<script src="{{ asset("/bower_components/landing-page/js/jquery-3.2.1.min.js") }}"></script>
<script src="{{ asset("/bower_components/landing-page/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("/bower_components/landing-page/js/jquery.slicknav.min.js") }}"></script>
<script src="{{ asset("/bower_components/landing-page/js/owl.carousel.min.js") }}"></script>
<script src="{{ asset("/bower_components/landing-page/js/mixitup.min.js") }}"></script>
<script src="{{ asset("/bower_components/landing-page/js/main.js") }}"></script>


<style>
    .register {
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        margin-top: 3%;
        padding: 3%;
    }

    .register-left {
        text-align: center;
        color: #fff;
        margin-top: 4%;
    }

    .register-left input {
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        width: 60%;
        background: #f8f9fa;
        font-weight: bold;
        color: #383d41;
        margin-top: 30%;
        margin-bottom: 3%;
        cursor: pointer;
    }

    .register-right {
        background: #f8f9fa;
        border-top-left-radius: 10% 50%;
        border-bottom-left-radius: 10% 50%;
    }

    .register-left img {
        margin-top: 15%;
        margin-bottom: 5%;
        width: 25%;
        -webkit-animation: mover 2s infinite alternate;
        animation: mover 1s infinite alternate;
    }

    @-webkit-keyframes mover {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(-20px);
        }
    }

    @keyframes mover {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(-20px);
        }
    }

    .register-left p {
        font-weight: lighter;
        padding: 12%;
        margin-top: -9%;
    }

    .register .register-form {
        padding: 10%;
        margin-top: 10%;
    }

    .btnRegister {
        float: right;
        margin-top: 10%;
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        background: #0062cc;
        color: #fff;
        font-weight: 600;
        width: 100%;
        cursor: pointer;
    }

    .register .nav-tabs {
        margin-top: 0.5%;
        border: none;
        background: #0062cc;
        border-radius: 1.5rem;
        width: 32%;
        float: right;
    }

    .register .nav-tabs .nav-link {
        padding: 2%;
        height: 34px;
        font-weight: 600;
        color: #fff;
        border-top-right-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }

    .register .nav-tabs .nav-link:hover {
        border: none;
    }

    .register .nav-tabs .nav-link.active {
        width: 130px;
        color: #0062cc;
        border: 2px solid #0062cc;
        border-top-left-radius: 1.5rem;
        border-bottom-left-radius: 1.5rem;
    }

    .register-heading {
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        color: #495057;
    }
</style>
</html>
<!-- end document-->
