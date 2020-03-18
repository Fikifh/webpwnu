<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Form Pendaftaran</title>
</head>
<body>
<div class="row col-sm-12">
    <div class="col-sm-4">
        <center>
            <h5>Form Pendaftaran </h4>
        </center>

        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{$participant->name}}</td>
            </tr>

            <tr>
                <td>NIK (Nomor Induk Kependudukan)</td>
                <td>:</td>
                <td>{{$participant->nik}}</td>
            </tr>

            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td>{{$participant->birth_place}}, {{$participant->birth_day}}</td>
            </tr>

            <tr>
                <td>Kota / Kab.</td>
                <td>:</td>
                <td>Kab. Sukabumi</td>
            </tr>

            <tr>
                <td>Alamat Sekarang</td>
                <td>:</td>
                <td>Kp. Banjarsari Cidadap Sukabumi</td>
            </tr>

            <tr>
                <td>Alamat Sesuai KTP</td>
                <td>:</td>
                <td>Kp. Banjarsari Cidadap Sukabumi</td>
            </tr>

            <tr>
                <td>Usia</td>
                <td>:</td>
                <td>22 Tahun</td>
            </tr>

            <tr>
                <td>Jumlah Hafalan</td>
                <td>:</td>
                <td>{{$participant->jumlah_hafalan}}</td>
            </tr>
            <tr>
                <td>Nama Ibu Kandung</td>
                <td>:</td>
                <td>Suhartini</td>
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
                    <td> Tingkat/Kelas {{$participant->school_name}}</td>
                @endif
            </tr>
        </table>
    </div>
    <div class="col-sm-2">
        @if($participant->type ==1)
            <img src="{{asset("/dokumenuser/pemberdayaan/".$participant->user_id.'/foto/'.$participant->foto)}}"/>
        @else
            <img src="{{asset("/dokumenuser/beasiswa/".$participant->user_id.'/foto'.$participant->foto)}}"/>
        @endif
    </div>
    <p>Page 1</p>
    <p class="center">KTP</p>
    @if($participant->type ==1)
        <img src="{{asset("/dokumenuser/pemberdayaan/".$participant->ktp.'/ktp/'.$participant->ktp)}}">
    @else
        <img src="{{asset("/dokumenuser/beasiswa/".$participant->ktp.'/ktp/'.$participant->ktp)}}">
    @endif
    <div class="page-break"></div>
    <p>Page 2</p>
    <p class="center">Ijazah</p>
    @if($participant->type ==1)
        <img src="{{asset("/dokumenuser/pemberdayaan/".$participant->ijazah.'/ijazah/'.$participant->ijazah)}}">
    @else
        <img src="{{asset("/dokumenuser/beasiswa/".$participant->ijazah.'/ijazah/'.$participant->ijazah)}}">
    @endif
    <div class="page-break"></div>
    <p>Page 3</p>
    <p class="center">Kartu Keluarga</p>
    @if($participant->type ==1)
        <img src="{{asset("/dokumenuser/pemberdayaan/".$participant->kk.'/kk/'.$participant->kk)}}">
    @else
        <img src="{{asset("/dokumenuser/beasiswa/".$participant->kk.'/kk/'.$participant->kk)}}">
    @endif
    <div class="page-break"></div>
    <p>Page 2</p>
    <p class="center">Surat Rekomendasi dari Desa</p>
    @if($participant->type ==1)
        <img src="{{asset("/dokumenuser/pemberdayaan/".$participant->surdes.'/surdes/'.$participant->surdes)}}">
    @else
        <img src="{{asset("/dokumenuser/beasiswa/".$participant->surdes.'/surdes/'.$participant->surdes)}}">
    @endif
    <div class="page-break"></div>
    <p>Page 2</p>
    <p class="center">Surat Rekomendasi dari Ormas</p>
    @if($participant->type ==1)
        <img src="{{asset("/dokumenuser/pemberdayaan/".$participant->suror.'/suror/'.$participant->suror)}}">
    @else
        <img src="{{asset("/dokumenuser/beasiswa/".$participant->suror.'/suror/'.$participant->suror)}}">
    @endif
    <div class="page-break"></div>
    <p>Page 2</p>
    @if($participant->type ==1)
        <p class="center">Bukti Hafalan (Syahadah)</p>
            <img src="{{asset("/dokumenuser/pemberdayaan/".$participant->bukti_hafalan.'/bukti_hafalan/'.$participant->bukti_hafalan)}}">
    @else
        <p class="center">Surat Keterangan Jumlah Hafalan</p>
        <img src="{{asset("/dokumenuser/beasiswa/".$participant->sur_ket_hafalan.'/sur_ket_hafalan/'.$participant->sur_ket_hafalan)}}">
    @endif
    <div class="page-break"></div>
    <p>Page 2</p>
    <p class="center">SKCK</p>
    @if($participant->type ==1)
        <img src="{{asset("/dokumenuser/pemberdayaan/".$participant->skck.'/skck/'.$participant->skck)}}">
    @else
        <img src="{{asset("/dokumenuser/beasiswa/".$participant->skck.'/skck/'.$participant->skck)}}">
    @endif
    <div class="page-break"></div>
    <p>Page 2</p>
    <p class="center">CV</p>
    @if($participant->type ==1)
        <img src="{{asset("/dokumenuser/pemberdayaan/".$participant->cv.'/cv/'.$participant->cv)}}">
    @else
        <img src="{{asset("/dokumenuser/beasiswa/".$participant->cv.'/cv/'.$participant->cv)}}">
    @endif
    <div class="page-break"></div>
</div>
</body>

<style type="text/css">
    * {
        font: 12px Serif;
    }

    .font-style {
        font: 12px Serif bold;
    }

    table tr td,
    table tr th {
        font-size: 9pt;
    }

    .page-break {
        page-break-after: always;
    }

    .center {
        text-align: center;
        font-weight: bold;
    }
</style>
</html>

