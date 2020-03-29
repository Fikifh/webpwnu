@extends('admin.Parent.parent')
@section('title', 'Menambahkan Informasi')
@section('content')
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
        <div class="col-sm-12 float-right">
            <a href="{{url('admin/informasi')}}" class="float-right">
                <img class="float-right" src="{{asset("/icons/refresh-ccw.svg")}}" aria-label="refresh">
            </a>
        </div>
        <form action="{{route("informasi.add")}}" method="post" enctype="multipart/form-data" class="col-sm-12">
            {{csrf_field()}}
            <div class="form-group">
                <label for="inputNamaBanner">Judul</label>
                <input name="judul" type="text" required
                       class="form-control"
                       id="inputNamaBanner" aria-describedby="inputNamaBannerHelp"
                       placeholder="Masukan Judul Kegiatan">
                <small id="inputNamaBannerHelp" class="form-text text-muted">Silahkan isi nama kegiatan untuk
                    di halaman utama.</small>
            </div>
            <div class="form-group">
                <label for="inputNamaBanner">Gambar</label>
                <input id="uploadImage" name="image" type="file" required
                       class="form-control"
                       id="inputNamaBanner" aria-describedby="inputNamaBannerHelp"
                       placeholder="Upload Gambar" onchange="PreviewImage();">
                <img id="uploadPreview" width="50px" height="35px"/>
                <small id="inputNamaBannerHelp" class="form-text text-muted">Silahkan upload gambar disini.</small>
            </div>
            <textarea name="content_kegiatan" class="ckeditor" id="ckedtor"></textarea>
            @if(count(\App\Models\Article::where('is_show', 1)->where('is_top', 1)->get()) <= 6)
                <div class="form-group">
                    <label for="status">Tampil Teratas</label>
                    <input id="status-edit" name="is_top" type="checkbox" data-toggle="toggle"
                           class="form-control col-sm-1" id="status" aria-describedby=statusHelp"
                           placeholder="Centang atau buka centang">
                    <small id="satusHelp" class="form-text text-muted">centang jika postingan ingin
                        ditampilkan teratas.</small>
                </div>
            @endif
            <div class="form-group">
                <input type="submit" class="btn btn-success">
            </div>
        </form>

    </div>

@endsection

@section('script')
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };

        $("#imgInp").change(function () {
            readURL(this);
        });

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
