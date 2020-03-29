@extends('admin.Parent.parent')
@section('title', 'Pendaftaran')
@section('content')
    <div class="row">
        {{--        <a href="{{url("admin/pendaftaran/add")}}" type="button"--}}
        {{--           data-toggle="modal" data-target="#modalAdd"--}}
        {{--           class="btn btn-outline-success btn-sm">--}}
        {{--            <img src="{{asset("/icons/plus-circle.svg")}}">--}}
        {{--            <i> Tambah</i>--}}
        {{--        </a>--}}
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
                    <th scope="col">Status</th>
                    <th scope="col">Berakhir Pada</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <p hidden="true">{{$i=1}}</p>
                @foreach($pendaftaran as $data)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$data->name}}</td>
                        <td>@if($data->is_open == 1)
                                <img src="{{asset("/icons/unlock.svg")}}">Dibuka
                            @else
                                <img src="{{asset("/icons/lock.svg")}}">Tutup
                            @endif
                        </td>
                        <td>
                            {{\Carbon\Carbon::parse($data->end_date)->locale('in')->diffForHumans()}}
                        </td>
                        <td>
                            <div class="btn-group">
                                @if($data->is_open == 0)
                                    <a href="#" data-toggle="modal" data-target="#modalAdd"
                                    >
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <img src="{{asset("/icons/unlock.svg")}}">
                                            <i> Buka</i>
                                        </button>
                                    </a>
                                @else
                                    <form method="POST" action="{{ route('pendaftaran.close',["id"=>$data->id]) }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                                onclick="return tanyaTutup()">
                                            <img src="{{asset("/icons/lock.svg")}}">
                                            <i> Tutup</i>
                                        </button>
                                    </form>
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
    <!-- Modal Add Pendaftaran -->
    <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-ku" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambahkan Pendaftaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('pendaftaran.open',["id"=>$data->id]) }}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="inputNamaPendaftaran">Set Tanggal Berakhir</label>
                            <input name="end_date" type="date" required class="form-control" id="inputNamaPendaftaran"
                                   aria-describedby="inputNamaPendaftaranHelp" placeholder="Masukan Nama Pendaftaran">
                            <small id="inputNamaPendaftaranHelp" class="form-text text-muted">Silahkan isi tanggal
                                berakhir pendaftaran.</small>
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
        function tanya() {
            var agree = confirm("Yakin ingin Membukanya ?");
            if (agree)
                return true;
            else
                return false
        }

        function tanyaTutup() {
            var agree = confirm("Yakin ingin Menutupnya ?");
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
