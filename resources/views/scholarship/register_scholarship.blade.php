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
    <title>Pendaftaran Beasiswa</title>

    <!-- Icons font CSS-->
    <link href="{{ asset("bower_components/regform/vendor/mdi-font/css/material-design-iconic-font.min.css") }}" rel="stylesheet" media="all">
    <link href="{{ asset("bower_components/regform/vendor/font-awesome-4.7/css/font-awesome.min.css") }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset("bower_components/regform/vendor/select2/select2.min.css") }}" rel="stylesheet" media="all">
    <link href="{{ asset("bower_components/regform/vendor/datepicker/daterangepicker.css") }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset("bower_components/regform/css/main.css") }}" rel="stylesheet" media="all">
</head>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <div class="wrapper wrapper--w790">
        <div class="card card-5">
            <div class="card-heading">
                <a href="{{url('/')}}">
                    <button class="fa  fa-home zmdi-invert-colors" style="margin-left: 30px; margin-top: 30px" >Home</button>
                </a>
                <h2 class="title">Pendaftaran Beasiswa PWNU</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{url('register-scholarship')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-row m-b-55">
                        <input class="input--style-5" hidden="true" type="text" name="id" value="{{$user->id}}">
                        <div class="name">Nama Lengkap</div>
                        <div class="input-group-desc">
                            <input class="input--style-5" type="text" disabled name="nama" value="{{$user->name}}">
                            <label class="label--desc">nama lengkap</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">NIK</div>
                        <div class="value">
                            <div class="input-group">
                                <input required class="input--style-5" type="number" name="nik">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Pendidikan</div>
                        <div class="value">
                            <div class="input-group">
                                <input required class="input--style-5" type="text" name="education">
                            </div>
                        </div>
                    </div>
                    <div class="form-row m-b-55">
                        <div class="name">Jumlah Hafalan Zuz</div>
                        <div class="value">
                            <div class="input-group-desc">
                                <input required class="input--style-5" type="number" name="jumlah_hafalan">
                            </div>
                        </div>
                    </div>
                    <div class="form-row m-b-55">
                        <div class="name">KTP</div>
                        <div class="value">
                            <div class="input-group-desc">
                                <input required class="input--style-5" type="file" name="ktp">
                            </div>
                        </div>
                    </div>
                    <div class="form-row m-b-55">
                        <div class="name">Ijazah</div>
                        <div class="value">
                            <div class="input-group-desc">
                                <input required class="input--style-5" type="file" name="ijazah">
                                <label class="label--desc">untuk pemberdayaan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row m-b-55">
                        <div class="name">Kartu Keluarga</div>
                        <div class="value">
                            <div class="input-group-desc">
                                <input required class="input--style-5" type="file" name="kk">
                            </div>
                        </div>
                    </div>
                    <div class="form-row m-b-55">
                        <div class="name">Surat Rekomendasi dari Desa</div>
                        <div class="value">
                            <div class="input-group-desc">
                                <input required class="input--style-5" type="file" name="surdes">
                            </div>
                        </div>
                    </div>
                    <div class="form-row m-b-55">
                        <div class="name">Surat Rekomendasi Ormas</div>
                        <div class="value">
                            <div class="input-group-desc">
                                <input required class="input--style-5" type="file" name="suror">
                                <label class="label--desc">surat rekomendasi dari ormas atau PC JQH</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row m-b-55">
                        <div class="name">Bukti Hafalan</div>
                        <div class="value">
                            <div class="input-group-desc">
                                <input required class="input--style-5" type="file" name="bukti_hafalan">
                                <label class="label--desc">Scan Bukti Hafalan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row m-b-55">
                        <div class="name">SKCK</div>
                        <div class="value">
                            <div class="input-group-desc">
                                <input required class="input--style-5" type="file" name="skck">
                            </div>
                        </div>
                    </div>
                    <div class="form-row m-b-55">
                        <div class="name">Surat Keterangan Jumlah Hafalan</div>
                        <div class="value">
                            <div class="input-group-desc">
                                <input required class="input--style-5" type="file" name="sur_ket_hafalan">
                                <label class="label--desc">Scan Surat Keterangan Hafalan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row m-b-55">
                        <div class="name">Syahadah</div>
                        <div class="value">
                            <div class="input-group-desc">
                                <input required class="input--style-5" type="file" name="syahadah">
                                <label class="label--desc">syahadah untuk pemberdayaan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row m-b-55">
                        <div class="name">CV</div>
                        <div class="value">
                            <div class="input-group-desc">
                                <input required class="input--style-5" type="file" name="cv">
                                <label class="label--desc">Curriculum Vitae</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row m-b-55">
                        <div class="name">Foto 3x4</div>
                        <div class="value">
                            <div class="input-group-desc">
                                <input required class="input--style-5" type="file" name="foto">
                                <label class="label--desc">foto ukuran 3x4</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn--radius-2 btn--red" type="submit">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="{{ asset("bower_components/regform/vendor/jquery/jquery.min.js") }}"></script>
<!-- Vendor JS-->
<script src="{{ asset("bower_components/regform/vendor/select2/select2.min.js") }}"></script>
<script src="{{ asset("bower_components/regform/vendor/datepicker/moment.min.js") }}"></script>
<script src="{{ asset("bower_components/regform/vendor/datepicker/daterangepicker.js") }}"></script>

<!-- Main JS-->
<script src="{{ asset("bower_components/regform/js/global.js") }}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
