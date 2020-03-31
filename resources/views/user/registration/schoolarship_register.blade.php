@if(!\Illuminate\Support\Facades\Auth::user())
    <script>window.location = "/";</script>
@endif
@extends('user.parent.user_home')
@section('style')

    <style>
        .register {
            /*background: -webkit-linear-gradient(left, #3931af, #00c6ff);*/
            background: -webkit-linear-gradient(left, #35af59, #acff44);
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
            background: #07af1d;
            color: #fff;
            font-weight: 600;
            width: 100%;
            cursor: pointer;
        }

        .register .nav-tabs {
            margin-top: 0.5%;
            border: none;
            background: #07af1d;
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
            color: #07af1d;
            border: 2px solid #07af1d;
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
@endsection
@section('title', 'Daftar | Upload Persyaratan')
@section('content')

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
                                    <label class="form-control-file font-weight-bold">Pendidikan Terakhir</label>
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
                        <h3 class="register-heading">Daftar Beasiswa</h3>
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
@endsection
