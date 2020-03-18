<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title></title>
</head>
<body onload="window.print()">
<div class="row">
    <div class="col-sm-8">
        @if($participant->type == 1)
            <p align="center">Form Pendaftaran Pemberdayaan</p>
        @else
            <p align="center">Form Pendaftaran Beasiswa</p>
        @endif
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{$participant->name}}</td>
                <td rowspan="7">
                    @if($participant->type ==1)
                        <img style="height:151.18110236px; width: 113.38582677px"
                             src="{{base_path()."/public/dokumenuser/pemberdayaan/".$participant->user_id.'/foto/'.$participant->foto}}"/>
                    @else
                        <img style="height:151.18110236px; width: 113.38582677px"
                             src="{{base_path()."/public/dokumenuser/beasiswa/".$participant->user_id.'/foto/'.$participant->foto}}"/>
                    @endif
                </td>
            </tr>

            <tr>
                <td>NIK (Nomor Induk Kependudukan)</td>
                <td>:</td>
                <td>{{$participant->nik}}</td>
            </tr>

            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td>
                    {{$participant->birth_place}}, {{date("d-m-Y", strtotime($participant->birth_day))}}
                </td>
            </tr>

            <tr>
                <td>Kota / Kab.</td>
                <td>:</td>
                <td>{{$participant->district}}</td>
            </tr>

            <tr>
                <td>Alamat Sesuai KTP</td>
                <td>:</td>
                <td>{{$participant->ktp_address}}</td>
            </tr>

            <tr>
                <td>Alamat Sekarang</td>
                <td>:</td>
                <td>{{$participant->address}}</td>
            </tr>

            <tr>
                <td>Usia</td>
                <td>:</td>
                <td>{{$participant->age}}</td>
            </tr>

            <tr>
                <td>Jumlah Hafalan</td>
                <td>:</td>
                <td>{{$participant->jumlah_hafalan}}</td>
            </tr>
            <tr>
                <td>Nama Ibu Kandung</td>
                <td>:</td>
                <td>{{$participant->birth_mother}}</td>
            </tr>
            <tr>
                <td>No Hp</td>
                <td>:</td>
                <td>{{$participant->phone}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{$participant->email}}</td>
            </tr>
            <tr>
                <td>Pendidikan Terakhir / Ditempuh</td>
                <td>:</td>
                @if($participant->type ==1)
                    <td>{{$participant->education}}</td>
                @else
                    <td>{{$participant->school_name}}</td>
                    <td> Tingkat/Kelas {{$participant->school_class}}</td>
                @endif
            </tr>
        </table>
    </div>
</div>
{{--<div class="page-break"></div>--}}
{{--<div class="col-sm-12">--}}
{{--    <p class="center">KTP</p>--}}
{{--    @if($participant->type ==1)--}}
{{--        <img class="a-4" src="{{base_path()."/public/dokumenuser/pemberdayaan/".$participant->user_id.'/ktp/'.$participant->ktp}}"/>--}}
{{--    @else--}}
{{--        <img class="a-4" src="{{base_path()."/public/dokumenuser/beasiswa/".$participant->user_id.'/ktp/'.$participant->ktp}}"/>--}}
{{--    @endif--}}
{{--</div>--}}
{{--<div class="page-break"></div>--}}
{{--<div class="col-sm-12">--}}
{{--    <p class="center">Ijazah</p>--}}
{{--    @if($participant->type ==1)--}}
{{--        <img class="a-4"--}}
{{--             src="{{base_path()."/public/dokumenuser/pemberdayaan/".$participant->user_id.'/ijazah/'.$participant->ijazah}}"/>--}}
{{--    @else--}}
{{--        <img class="a-4"--}}
{{--             src="{{base_path()."/public/dokumenuser/beasiswa/".$participant->user_id.'/ijazah/'.$participant->ijazah}}"/>--}}
{{--    @endif--}}
{{--</div>--}}
{{--<div class="page-break"></div>--}}
{{--<div class="col-sm-12">--}}
{{--    <p class="center">Kartu Keluarga</p>--}}
{{--    @if($participant->type ==1)--}}
{{--        <img class="a-4" src="{{base_path()."/public/dokumenuser/pemberdayaan/".$participant->user_id.'/kartu-keluarga/'.$participant->kk}}"/>--}}
{{--    @else--}}
{{--        <img class="a-4" src="{{base_path()."/public/dokumenuser/beasiswa/".$participant->user_id.'/kartu-keluarga/'.$participant->kk}}"/>--}}
{{--    @endif--}}
{{--</div>--}}
{{--<div class="page-break"></div>--}}
{{--<div class="col-sm-12">--}}
{{--    <p class="center">Surat Rekomendasi dari Desa</p>--}}
{{--    @if($participant->type ==1)--}}
{{--        <img class="a-4"--}}
{{--             src="{{base_path()."/public/dokumenuser/pemberdayaan/".$participant->user_id.'/surdes/'.$participant->surdes}}"/>--}}
{{--    @else--}}
{{--        <img class="a-4"--}}
{{--             src="{{base_path()."/public/dokumenuser/beasiswa/".$participant->user_id.'/surdes/'.$participant->surdes}}"/>--}}
{{--    @endif--}}
{{--</div>--}}
{{--<div class="page-break"></div>--}}
{{--<div class="col-sm-12">--}}
{{--    <p class="center">Surat Rekomendasi dari Ormas</p>--}}
{{--    @if($participant->type ==1)--}}
{{--        <img class="a-4"--}}
{{--             src="{{base_path()."/public/dokumenuser/pemberdayaan/".$participant->user_id.'/suror/'.$participant->suror}}"/>--}}
{{--    @else--}}
{{--        <img class="a-4" src="{{base_path()."/public/dokumenuser/beasiswa/".$participant->user_id.'/suror/'.$participant->suror}}"/>--}}
{{--    @endif--}}
{{--</div>--}}
{{--<div class="page-break"></div>--}}
{{--<div class="col-sm-12">--}}
{{--    @if($participant->type ==1)--}}
{{--        <p class="center">Bukti Hafalan (Syahadah)</p>--}}
{{--        <img class="a-4"--}}
{{--             src="{{base_path()."/public/dokumenuser/pemberdayaan/".$participant->user_id.'/bukti_hafalan/'.$participant->bukti_hafalan}}"/>--}}
{{--    @else--}}
{{--        <p class="center">Surat Keterangan Jumlah Hafalan</p>--}}
{{--        <img class="a-4"--}}
{{--             src="{{base_path()."/public/dokumenuser/beasiswa/".$participant->user_id.'/sur_ket_hafalan/'.$participant->sur_ket_hafalan}}"/>--}}
{{--    @endif--}}
{{--</div>--}}
{{--<div class="page-break"></div>--}}
{{--<div class="col-sm-12">--}}
{{--    <p class="center">SKCK</p>--}}
{{--    @if($participant->type ==1)--}}
{{--        <img class="a-4"--}}
{{--             src="{{base_path()."/public/dokumenuser/pemberdayaan/".$participant->user_id.'/skck/'.$participant->skck}}"/>--}}
{{--    @else--}}
{{--        <img class="a-4" src="{{base_path()."/public/dokumenuser/beasiswa/".$participant->user_id.'/skck/'.$participant->skck}}"/>--}}
{{--    @endif--}}
{{--</div>--}}
{{--<div class="page-break"></div>--}}
{{--<div class="col-sm-12">--}}
{{--    <p class="center">CV</p>--}}
{{--    @if($participant->type ==1)--}}
{{--        <img class="a-4" src="{{base_path()."/public/dokumenuser/pemberdayaan/".$participant->user_id.'/cv/'.$participant->cv}}"/>--}}
{{--    @else--}}
{{--        <img class="a-4" src="{{base_path()."/public/dokumenuser/beasiswa/".$participant->user_id.'/cv/'.$participant->cv}}"/>--}}
{{--    @endif--}}
{{--    <div onload="window.print()" class="page-break"></div>--}}
{{--</div>--}}
</body>

<style type="text/css">
    * {
        font: 18px Serif;
    }

    .page-font {
        font-size: 7px;
        margin-top: 25px;
    }
    .a-4 {
        width: 790px;
        height: 950px;
        align-content: center;
        align-items: center;
        /*1240 x 1754*/
    }

    .font-style {
        font: 18px Serif bold;
    }

    table tr td,
    table tr th {
        font-size: 12pt;
    }

    .page-break {
        page-break-after: always;
    }

    .center {
        text-align: center;
        font-weight: bold;
    }
</style>
<script type="text/javascript">
    function print(){
       return window.print();
    }

</script>
</html>

