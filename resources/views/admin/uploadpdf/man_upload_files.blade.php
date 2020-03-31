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
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Ekstensi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Download</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <p hidden="true">{{$i=1}}</p>
                @foreach($files as $data)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$data->name}}</td>
                        <td>{{$data->description}}</td>
                        <td>{{$data->extension}}</td>
                        <td>{{$data->is_show == 1 ? "Ditampilkan":"Disembunyikan"}}</td>
                        <td>
                            <a href="{{url("admin/files/download?path_file=files&name_file=".$data->file)}}" class="btn">
                                <img src="{{asset("/icons/download.svg")}}"/>
                            </a>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{url("admin/files/del?id=".$data->id."&path_file=files")}}">
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return tanya()">
                                        <img src="{{asset("/icons/trash-2.svg")}}">
                                        <i> Delete</i>
                                    </button>
                                </a>
                                @if($data->is_show == 1)
                                    <a href="{{url("admin/files/hide/".$data->id)}}">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                                data-target="#modalTable">
                                            <img src="{{asset("/icons/eye-off.svg")}}">
                                            <i> Sembunyikan</i>
                                        </button>
                                    </a>
                                @else
                                    <a href="{{url("admin/files/hide/".$data->id)}}">
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
                    <form action="{{url("admin/files")}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="inputNamaBanner">Nama File</label>
                            <input name="name" type="text" required class="form-control" id="inputNamaBanner"
                                   aria-describedby="inputNamaBannerHelp" placeholder="Masukan Nama File">
                            <small id="inputNamaBannerHelp" class="form-text text-muted">Silahkan Isi Nama File.</small>
                        </div>
                        <div class="form-group">
                            <label for="inputNamaBanner">Deskripsi File</label>
                            <input name="desc" type="text" class="form-control" id="inputNamaBanner"
                                   aria-describedby="inputNamaBannerHelp" placeholder="Masukan Deskripsi File">
                            <small id="inputNamaBannerHelp" class="form-text text-muted">Silahkan Isi Deskripsi Jika Diperlukan.</small>
                        </div>
                        <div class="form-group">
                            <label for="inputNamaBanner">Upload File</label>
                            <input name="file" type="file" required class="form-control" id="inputImageBanner"
                                   aria-describedby="inputImageBannerHelp" placeholder="Upload File Banner">
                            <small id="inputImageBannerHelp" class="form-text text-muted">Upload File Disini.</small>
                        </div>
                        <div class="form-group">
                            <label for="status">Sembynyikan ?</label>
                            <input name="status" type="checkbox" data-toggle="toggle"
                                   class="form-control col-sm-1" id="status" aria-describedby=statusHelp"
                                   placeholder="Centang atau buka centang">
                            <small id="satusHelp" class="form-text text-muted">Centang checkbox jika file ingin disembunyikan.</small>
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
