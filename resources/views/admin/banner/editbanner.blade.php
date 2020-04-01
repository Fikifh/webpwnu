@extends('admin.Parent.parent')
@section('content')
    <h3 style="text-align: center">Edit Banner</h3>
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 align-content-center">
            <form action="{{ route('bannerupdate', ["id"=>$rows->id])}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{csrf_field("post")}}
                <input name="id" type="number" hidden="true" value="{{$rows->id}}">
                <div class="form-group">
                    <label for="inputNamaBanner">Judul Banner</label>
                    <input value="{{$rows->title}}" id="title-edit" name="title" type="text" required
                           class="form-control"
                           id="inputNamaBanner" aria-describedby="inputNamaBannerHelp"
                           placeholder="Masukan Nama Banner">
                    <small id="inputNamaBannerHelp" class="form-text text-muted">Silahkan isi nama banner untuk
                        di halaman utama.</small>
                </div>
                <div class="form-group">
                    <input id="is_image_edit" name="is_image_edit" type="checkbox" aria-describedby=statusHelp"
                           placeholder="Centang atau buka centang">
                    <small id="satusHelp" class="form-text text-muted">Centang Jika ingin mengedit dan upload
                        gambar</small>
                    <label for="inputNamaBanner">Upload Banner</label>
                    <input value="{{$rows->image}}" id="image-edit" name="image"
                           type="file" class="form-control"
                           id="inputImageBanner"
                           aria-describedby="inputImageBannerHelp" placeholder="Upload File Banner">
                    <small id="inputImageBannerHelp" class="form-text text-muted">Upload File Banner dengan
                        resolusi bagus.</small>
                </div>
                <div class="form-group">
                    <label for="status">Status Tampil</label>
                    @if($rows->is_show==1)
                        <input checked id="status-edit" name="status" type="checkbox" checked data-toggle="toggle"
                               class="form-control col-sm-1" id="status" aria-describedby=statusHelp"
                               placeholder="Centang atau buka centang">
                        <small id="satusHelp" class="form-text text-muted">Uncheck Status jika banner ingin
                            disembunyikan</small>
                    @else
                        <input id="status-edit" name="status" type="checkbox" data-toggle="toggle"
                               class="form-control col-sm-1" id="status" aria-describedby=statusHelp"
                               placeholder="Centang atau buka centang">
                        <small id="satusHelp" class="form-text text-muted">centang Status jika banner ingin
                            ditampilkan </small>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection
