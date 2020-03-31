@extends('user.parent.user_home')
@section('style')
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

@endsection
@section('title', 'Buat Akun')
@section('content')
    <div class="spad page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3" style="background-color: azure">
                <div class="card-body">
                    <h2 class="title" style="color: #007020">Buat Akun</h2>
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
                            <input required="true" class="form-control" type="number" placeholder="NIK" name="nik">
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
@endsection
