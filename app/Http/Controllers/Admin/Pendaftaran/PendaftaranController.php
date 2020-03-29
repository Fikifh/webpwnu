<?php

namespace App\Http\Controllers\Admin\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\MasterPendaftaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index(Request $request){
        $pendaftaran = MasterPendaftaran::all();
        return view('admin.pendaftaran.pendaftaran', compact('pendaftaran'));
    }


    public function openPendaftaran(Request $request){
        $pendaftaran = MasterPendaftaran::find($request->id);
        if($pendaftaran){
            $pendaftaran->is_open = 1;
            $pendaftaran->end_date = $request->end_date;
            $pendaftaran->save();
            return redirect(route('pendaftaran'))->with('alert-success', 'Pendaftaran Berhasil Dibuka');
        }
        return redirect(route('pendaftaran'))->with('alert', 'Pendaftaran Tidak ditemukan !');
    }

    public function closePendaftaran(Request $request){
        $pendaftaran = MasterPendaftaran::find($request->id);
        if($pendaftaran){
            $pendaftaran->is_open = 0;
            $pendaftaran->end_date = Carbon::now();
            $pendaftaran->save();
            return redirect(route('pendaftaran'))->with('alert-success', 'Pendaftaran Berhasil Ditutup');
        }
        return redirect(route('pendaftaran'))->with('alert', 'Pendaftaran Tidak ditemukan !');
    }


    public function store(Request $request, MasterPendaftaran $pendaftaran){
        $pendaftaran->name = $request->name;
        $pendaftaran->is_open = !empty($request->is_open) ? 1:0;
        if($pendaftaran->save()){
            return redirect(route('pendaftaran.get.add'))->with('alert-success', 'Pendaftaran Berhasil Diposting');
        }
        return redirect(route('pendaftaran.get.add'))->with('alert', 'Pendaftaran Gagal Diposting');
    }
}
