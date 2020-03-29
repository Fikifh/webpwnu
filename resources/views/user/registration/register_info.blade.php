@extends('user.parent.user_home')
@section('content')

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
@endsection
