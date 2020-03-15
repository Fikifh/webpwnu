<?php

namespace App\Http\Controllers\Scholarship;

use App\Http\Controllers\Controller;
use App\models\scholarship\DocumentModel;
use App\User;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function test(){
        $user = User::find(3);
        $role = $user->roles($user->roles_id);
        return $role->role_name;
    }

    public function getRegisterScholarship(Request $request){
        $email = $request->query('email');
        $user = User::where('email', $email)->first();
        return view('scholarship.register_scholarship', compact('user'));
    }
    public function registerScholarshipPost(Request $request){
        $userId = $request->id;
        $documet = new DocumentModel();

        $documet->nik = $request->nik;
        $documet->education = $request->education;
        $documet->jumlah_hafalan = $request->jumlah_hafalan;
        $documet->user_id = $userId;

        $file = $request->file('ktp');
        $ktp = time()."_".$file->getClientOriginalName();
        $tujuan_ktp = 'dokumenuser/'.$userId.'/ktp';
        $file->move($tujuan_ktp,$ktp);
        $documet->ktp = $ktp;

        $ijazahFile = $request->file('ijazah');
        $ijazah = time()."_".$ijazahFile->getClientOriginalName();
        $tujuan_ijazah = 'dokumenuser/'.$userId.'/ijazah';
        $ijazahFile->move($tujuan_ijazah,$ijazah);
        $documet->ijazah = $ijazah;

        $surdesFile = $request->file('surdes');
        $surdes = time()."_".$surdesFile->getClientOriginalName();
        $tujuan_surdes = 'dokumenuser/'.$userId.'/surdes';
        $surdesFile->move($tujuan_surdes, $surdes);
        $documet->surdes = $surdes;


        $surorFile = $request->file('suror');
        $suror = time()."_".$surorFile->getClientOriginalName();
        $tujuan_suror = 'dokumenuser/'.$userId.'/suror';
        $surorFile->move($tujuan_suror, $suror);
        $documet->suror = $suror;


        $bukti_hafalanFile = $request->file('bukti_hafalan');
        $bukti_hafalan = time()."_".$bukti_hafalanFile->getClientOriginalName();
        $tujuan_bukti_hafalan = 'dokumenuser/'.$userId.'/bukti_hafalan';
        $bukti_hafalanFile->move($tujuan_bukti_hafalan, $bukti_hafalan);
        $documet->bukti_hafalan = $bukti_hafalan;


        $skckFile = $request->file('skck');
        $skck = time()."_".$skckFile->getClientOriginalName();
        $tujuan_skck = 'dokumenuser/'.$userId.'/skck';
        $skckFile->move($tujuan_skck, $skck);
        $documet->skck = $skck;

        $sur_ket_hafalanFile = $request->file('sur_ket_hafalan');
        $sur_ket_hafalan = time()."_".$sur_ket_hafalanFile->getClientOriginalName();
        $tujuan_sur_ket_hafalan = 'dokumenuser/'.$userId.'/sur_ket_hafalan';
        $sur_ket_hafalanFile->move($tujuan_sur_ket_hafalan, $sur_ket_hafalan);
        $documet->sur_ket_hafalan = $sur_ket_hafalan;


        $syahadahFile = $request->file('syahadah');
        $syahadah = time()."_".$syahadahFile->getClientOriginalName();
        $tujuan_syahadah = 'dokumenuser/'.$userId.'/syahadah';
        $syahadahFile->move($tujuan_syahadah, $syahadah);
        $documet->syahadah = $syahadah;

        $cvFile = $request->file('cv');
        $cv = time()."_".$cvFile->getClientOriginalName();
        $tujuan_cv = 'dokumenuser/'.$userId.'/cv';
        $cvFile->move($tujuan_cv, $cv);
        $documet->cv = $cv;

        $fotoFile = $request->file('foto');
        $foto = time()."_".$fotoFile->getClientOriginalName();
        $tujuan_foto = 'dokumenuser/'.$userId.'/foto';
        $fotoFile->move($tujuan_foto, $foto);
        $documet->foto = $foto;

        if($documet->save()){
            $message = 'Berhasil Upload';
            return view('scholarship.success_register', compact('message'));
        }


    }

}
