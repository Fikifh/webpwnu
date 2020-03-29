@extends('admin.Parent.parent')
@section('title', 'Banner')

@section('content')
    <div class="row">
        <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalAdd">
            <img src="{{asset("/icons/plus-circle.svg")}}">
            <i> Tambah</i>
        </button>
        @if(\Session::has('alert'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{Session::get('alert')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(\Session::has('alert-success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{Session::get('alert-success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col-sm-12 float-right">
            <a href="{{url('admin/banner')}}" class="float-right">
                <img class="float-right" src="{{asset("/icons/refresh-ccw.svg")}}" aria-label="refresh">
            </a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <p hidden="true">{{$i=1}}</p>
                @foreach($rows as $data)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$data->title}}</td>
                        <td><img src="{{ asset("/files/admin/banners/".$data->image)}}" width="75px" height="50px"/>
                        </td>
                        <td>@if($data->is_show == 1)
                                ditampilkan
                            @else
                                Tidak ditampilkan
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{url("admin/banner/edit/".$data->id)}}">
                                    <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal"
                                            data-target="#modalTable">
                                        <img src="{{asset("/icons/edit.svg")}}">
                                        <i> Edit</i>
                                    </button>
                                </a>
                                <form method="POST" action="{{ route('banner.destroy',["id"=>$data->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return tanya()">
                                        <img src="{{asset("/icons/trash-2.svg")}}">
                                        <i> Delete</i>
                                    </button>
                                </form>
                                @if($data->is_show == 1)
                                    <a href="{{url("admin/banner/unshow/".$data->id)}}">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                                data-target="#modalTable">
                                            <img src="{{asset("/icons/eye-off.svg")}}">
                                            <i> Sembunyikan</i>
                                        </button>
                                    </a>
                                @else
                                    <a href="{{url("admin/banner/show/".$data->id)}}">
                                        <button type="button" class="btn btn-outline-primary btn-sm"
                                                data-toggle="modal"
                                                data-target="#modalTable">
                                            <img src="{{asset("/icons/eye.svg")}}">
                                            <i> Tampilkan</i>
                                        </button>
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- CLASS MODAL -->
    <!-- Modal Add Banner -->
    <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-ku" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambahkan Banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url("admin/banner")}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="inputNamaBanner">Judul Banner</label>
                            <input name="title" type="text" required class="form-control" id="inputNamaBanner"
                                   aria-describedby="inputNamaBannerHelp" placeholder="Masukan Nama Banner">
                            <small id="inputNamaBannerHelp" class="form-text text-muted">Silahkan isi nama banner untuk
                                di halaman utama.</small>
                        </div>
                        <div class="form-group">
                            <label for="inputNamaBanner">Upload Banner</label>
                            <input name="image" type="file" required class="form-control" id="inputImageBanner"
                                   aria-describedby="inputImageBannerHelp" placeholder="Upload File Banner">
                            <small id="inputImageBannerHelp" class="form-text text-muted">Upload File Banner dengan
                                resolusi bagus.</small>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input name="status" type="checkbox" checked data-toggle="toggle"
                                   class="form-control col-sm-1" id="status" aria-describedby=statusHelp"
                                   placeholder="Centang atau buka centang">
                            <small id="satusHelp" class="form-text text-muted">Uncheck Status jika banner tidak ingin
                                disembunyikan</small>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--END OF ADD MODAL -->
@endsection

@section('script')
    <script>
        function tanya(){
            var agree=confirm("Are you sure you want to delete this file?");
            if (agree)
                return true;
            else
                return false
        }
        var data = $.ajax({
            url: "{{url('admin/banner/edit')}}/" + document.getElementById("#id").value,
            type: 'POST',
            // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            data: {
                _method: 'GET',
                match_id: id,
                start_time: newTime,
                _token: '{{ csrf_token() }}'
            }
        });

    </script>
@endsection
