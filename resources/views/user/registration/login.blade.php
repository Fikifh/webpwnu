@extends('user.parent.user_home')
@section('style')
    <!-- Icons font CSS-->
    <link
        href="{{ asset("/bower_components/colorlib-regform/vendor/mdi-font/css/material-design-iconic-font.min.css") }}"
        rel="stylesheet" media="all">
    <link href="{{ asset("/bower_components/colorlib-regform/vendor/font-awesome-4.7/css/font-awesome.min.css") }}"
          rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset("/bower_components/colorlib-regform/vendor/select2/select2.min.css") }}" rel="stylesheet"
          media="all">
    <link href="{{ asset("/bower_components/colorlib-regform/vendor/datepicker/daterangepicker.css") }}"
          rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset("/bower_components/colorlib-regform/css/main.css") }}" rel="stylesheet" media="all">
@endsection
@section('title', 'Masuk')
@section('content')
    <div class="spad page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins" style="padding-top: 70px; padding-bottom: 70px !important;">
        <div class="col-sm-4 wrapper wrapper--w780">
            <div class="card card-blue card-gray">
                <div class="card-heading" style="padding-bottom:1px !important; padding-top: 10px !important; align-items: center; margin-left: 40%; margin-right: 40%; background-color: ghostwhite !important;">
                    <img src="{{asset("/bower_components/landing-page/img/pwnulogo.jpg")}}" style="align-items: center" class="title" width="120px" height="120px"/>
                </div>
                <div class="card-body" style="background-color: #08192d">
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
                    <form method="POST" {{url('login')}}>
                        {{csrf_field()}}
                        <div class="input-group">
                            <input required class="input--style-3" type="number" placeholder="NIK" name="nik">
                        </div>
                        <div class="input-group">
                            <input required class="input--style-3" type="password" placeholder="Password"
                                   name="password">
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn-outline-success" type="submit">Masuk <img src="{{asset("/icons/log-in.svg")}}"/></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
