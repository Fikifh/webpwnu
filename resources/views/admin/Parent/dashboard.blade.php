@extends('admin.Parent.parent')
@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$participant = \App\models\scholarship\DocumentModel::all()->count('id')}}</h3>

                    <p>Jumlah Pendaftar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                @if($participant > 0)
                    <a href="{{url('admin/download-all-files')}}" class="small-box-footer">Download Semua
                        File
                        <i class="fas fa-file-download"></i></a>
                @endif
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>@</h3>
                    <p>Export Pendaftar Pemberdayaan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{url('admin/export-pemberdayaan-to-excel')}}" class="small-box-footer">Lakukan
                    Export<i class="fas fa-file-excel"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>@<sup style="font-size: 20px"></sup></h3>

                    <p>Export Peserta Beasiswa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{url('admin/export-beasiswa-to-excel')}}" class="small-box-footer">Lakukan
                    Export<i class="fas fa-file-excel"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <!-- select list-->
    <div class="row">
        <div class="col col-sm-12">
            <form method="GET" action="{{url('admin/list')}}">
                <select class="form-group" name="type" id="type">
                    @if(count($user)<1)
                        <option value="1" selected>Pemberdayaan</option>
                        <option value="2" id="select2">Beasiswa</option>
                    @else
                        @if($user->first()->type == 1)
                            <option value="1" selected>Pemberdayaan</option>
                            <option value="2" id="select2">Beasiswa</option>
                        @else
                            <option value="1">Pemberdayaan</option>
                            <option value="2" selected>Beasiswa</option>
                        @endif
                    @endif
                </select>
                <input type="submit" class="fa fa-filter" value="Filter">
            </form>
        </div>
    </div>
    <!-- Main row -->
    <div class="row">
    {{--                    <input type="text" hidden="true" value="{{$user = \App\models\scholarship\DocumentModel::all()}}">--}}
    <!-- Table -->
        <table class="table table-responsive table-bordered table-striped" style="width:100%;">
            <thead>
            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Jenis Kelamin</th>
                <th>TTL</th>
                <th>Alamat</th>
                <th>No. Hp</th>
                <th>Pendidikan</th>
                <th>Jumlah Hafalan</th>
                <th>Berkas</th>
                <th>Print</th>
            </tr>
            </thead>
            <tbody>
            <p hidden="true">{{$i=1}}</p>
            @foreach($user as $userData)
                <input type="text" hidden="true" {{$userTable = \App\User::find($userData->user_id)}} />
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$userTable->id}}</td>
                    <td>{{$userTable->name}}</td>
                    <td>{{$userTable->nik}}</td>
                    <td>{{$userTable->gender}}</td>
                    <td>{{$userTable->birth_place.', '.$userTable->birth_day}}</td>
                    <td>{{$userTable->address}}</td>
                    <td>{{$userTable->phone}}</td>
                    @if($userData->type = 1)
                        <td>{{$userData->education}}</td>
                    @else
                        <td>{{$userData->school_name}} / {{$userData->school_class}}</td>
                    @endif
                    <td>{{$userData->jumlah_hafalan}}</td>
                    <td>
                        <a href="{{url('admin/detail/'.$userData->user_id)}}">
                            <button class="btn-success fa fa-eye-slash">Lihat</button>
                        </a>
                        <a href="{{url('admin/download-zip/'.$userData->user_id.'/'.$userTable->name)}}">
                            <button class="btn-success fa fa-file-zip-o">Zip</button>
                        </a>
                        <a href="{{url('admin/print-to-pdf/'.$userData->user_id)}}">
                            <button class="btn-success fa fa-file-pdf">PDF</button>
                        </a>
                    </td>
                    <td>
                        <a href="{{url('admin/print-to-printer/'.$userData->user_id)}}" target="_blank">
                            <button class="btn-success fa fa-print">Print</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-sm">
            Halaman : {{ $user->currentPage() }}<br>
            Jumlah Data : {{ $user->total() }}<br>
            Data Per Halaman : {{ $user->perPage() }}<br>
            {{ $user->appends(request()->input())->links()}}
        </div>
        <!-- End Table -->
    </div>
@endsection
