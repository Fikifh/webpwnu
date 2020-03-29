@extends('user.parent.user_home')
@section('title', $article->title)
{{--@section('title', $data->judul)--}}
@section('content')
    <section class="spad">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>{{$article->title}}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @if($article)
                        <div class="float-left">
                            <img class="brand-image img-circle elevation-3" src="{{asset("/icons/user.svg")}}"/>
                            <a>{{$article->writer}}</a><span> | </span>
                            <i>{{$article->created_at->diffForHumans()}}</i>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    @if($article->categories_id == 1)
                        <img src="{{asset("/files/kegiatan/".$article->image)}}" class="col-sm-12 article-image"/>
                    @else
                        <img src="{{asset("/files/informasi/".$article->image)}}" class="col-sm-12 article-image"/>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8" style="text-align: justify">
                    <p style="text-align: justify;">
                        {!! html_entity_decode($article->content) !!}
                    </p>
                </div>
                <div class="col-sm-4">
                    <h5 style="margin: 15px">Related Post</h5>
                    @foreach($articles as $data)
                        <div class="col-sm-6">
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
                                    <p class="card-title">Card title ldkfj ldfjkgk dfgl ldkfjg l jfdlk </p>
                                    <a href="#" class="btn btn-outline-success"><img
                                            src="{{asset("/icons/arrow-right-circle.svg")}}"></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

