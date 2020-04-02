@extends('user.parent.user_home')
@section('title', 'Downloads')

@section('content')
    <div class="container">
        <div class="row">
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
            <div class="table-responsive" style="margin-top: 50px">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Ekstensi</th>
                        <th scope="col">Status</th>
                        <th scope="col">Download</th>
                    </tr>
                    </thead>
                    <tbody>
                    <p hidden="true">{{$i=1}}</p>
                    @foreach($downloads as $data)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$data->name}}</td>
                            <td>{{$data->description}}</td>
                            <td>{{$data->extension}}</td>
                            <td>{{$data->is_show == 1 ? "Ditampilkan":"Disembunyikan"}}</td>
                            <td>
                                <a href="{{url("admin/files/download?path_file=files&name_file=".$data->file)}}"
                                   class="btn">
                                    <img src="{{asset("/icons/download.svg")}}"/>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function tanya() {
            var agree = confirm("Are you sure you want to delete this file?");
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
