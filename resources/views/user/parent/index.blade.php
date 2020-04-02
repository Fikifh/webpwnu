@extends('user.parent.user_home')
@section('title', 'PWJQHNU')
@section('content')

    <!-- Hero section -->
    <section class="hero-section">
        <div class="hero-slider owl-carousel">
            @foreach($banners as $data)
                <div class="hs-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="hs-text">
                                    <h2><span>{{$data->title}}</span></h2>
                                    <p>{{$data->description}}</p>
                                    @if(\App\Models\MasterPendaftaran::where('name', 'Pemberdayaan dan Beasiswa')->first()->is_open == 1)
                                        @if(\Illuminate\Support\Facades\Auth::user())
                                            @if(\App\models\scholarship\DocumentModel::where('user_id', session('id'))->first())
                                                <a href="#" class="site-btn">Anda Terdaftar</a>
                                            @else
                                                <a href="{{url('register-scholarship?nik='.\Illuminate\Support\Facades\Session::get('nik'))}}"
                                                   class="site-btn">Pendaftaran Telah Dibuka Upload Persyaratan</a>
                                            @endif
                                        @endif
                                    @else
                                        <a class="site-btn">Pendaftaran Belum Dibuka</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="hr-img">
                                    <img src="{{ asset("files/admin/banners/".$data->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!--Activity Gallery -->
    <section class="activity-gallery spad">
        <div class="container">
            <div class="row">
                @if(count($toparticles) > 0)
                    @for($i=0; $i<2; $i++)
                        <div class="col-sm-6 hover-appear">
                            <div class="card col-sm-12" style="padding: 0px !important;">
                                @if($toparticles[$i]->categories_id == 1)
                                    <img class="card-img-top hover-appear image-top-activity"
                                         src="{{asset("/files/kegiatan/".$toparticles[$i]->image)}}"
                                         alt="Card image cap" style="height: 20rem !important;">
                                @else
                                    <img class="card-img-top hover-appear image-top-activity"
                                         src="{{asset("/files/informasi/".$toparticles[$i]->image)}}"
                                         alt="Card image cap" style="height: 20rem !important;">
                                @endif
                                <div class="middle card-body">
                                    <h5 class="card-title">{{$toparticles[$i]->title}}</h5>
                                    <a href="{{url("artikel/".$toparticles[$i]->link)}}"
                                       class="btn btn-outline-success"><img
                                            src="{{asset("/icons/arrow-right-circle.svg")}}"> Lihat</a>
                                </div>
                            </div>
                            <a href="#" class="col-sm-12 foot-card">
                                <h5 class="text-foot">{{ $toparticles[$i]->title }}</h5>
                            </a>
                        </div>
                    @endfor
                @endif
            </div>
            <div class="row" style="margin-top: 10px;">
                @for($i=2; $i<count($toparticles); $i++)
                    <div class="col-sm-3 card-be-hover">
                        <div class="card card-hovers">
                            @if($toparticles[$i]->categories_id == 1)
                                <img class="card-img-top"
                                     src="{{asset("/files/kegiatan/".$toparticles[$i]->image)}}"
                                     alt="Card image cap">
                            @endif
                            @if($toparticles[$i]->categories_id == 2)
                                <img class="card-img-top"
                                     src="{{asset("/files/informasi/".$toparticles[$i]->image)}}"
                                     alt="Card image cap">
                            @else
                                <img class="card-img-top"
                                     src="{{asset("/files/kegiatan/".$toparticles[$i]->image)}}"
                                     alt="Card image cap">
                            @endif
                            <div class="card-body">
                                <p class="card-title">{{$toparticles[$i]->title}}</p>
                                <a href="{{url("artikel/".$toparticles[$i]->link)}}"
                                   class="btn btn-outline-success"><img
                                        src="{{asset("/icons/arrow-right-circle.svg")}}"></a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
    <!-- END ACTIVITY GALLERY -->
    <!-- NAV 2 -->
    <section class="spad">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link hover-text" href="#">Kegiatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-text" href="#">Informasi</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        @foreach($articles as $data)
                            <div class="col-sm-4 card-be-hover">
                                <div class="card card-hovers">
                                    @if($data->categories_id == 1)
                                        <img class="card-img-top"
                                             src="{{asset("/files/kegiatan/".$data->image)}}"
                                             alt="Card image cap">
                                    @else
                                        <img class="card-img-top"
                                             src="{{asset("/files/informasi/".$data->image)}}"
                                             alt="Card image cap">
                                    @endif
                                    <div class="card-body">
                                        <p class="card-title" style="color: black; font-family: Sans-Serif">{{$data->title}}</p>
                                        <a href="{{url("artikel/".$data->link)}}" class="float-right" style="font-family: Sans-Serif; font-size: 12px; color: green;">
                                            Baca Selengkapnya <img src="{{asset("/icons/arrow-right-circle.svg")}}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-4">
                    <h5 style="text-shadow: black">Our Channel</h5>
                    <iframe style="padding: 0px;" class="col-xl-12" height="345px"
                            src="https://www.youtube.com/embed/P2g0JToC17k" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- END NAV 2 -->
@endsection
@section('script')
    <script>

    </script>
@endsection
