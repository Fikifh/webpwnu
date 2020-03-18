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

    public function registerEmpowermentPost(Request $request){
        $userId = $request->id;
        $documet = new DocumentModel();

        $documet->nik = $request->nik;
        $documet->education = $request->education;
        $documet->jumlah_hafalan = $request->jumlah_hafalan;
        $documet->user_id = $userId;

        $file = $request->file('ktp');
        $ktp = time()."_"."ktp.".$file->extension();
        $tujuan_ktp = 'dokumenuser/pemberdayaan/'.$userId.'/ktp';
        $file->move($tujuan_ktp,$ktp);
        $documet->ktp = $ktp;

        $fileKk = $request->file('kk');
        $kk = time()."_"."kk.".$fileKk->extension();
        $tujuan_kk = 'dokumenuser/pemberdayaan/'.$userId.'/kartu-keluarga';
        $fileKk->move($tujuan_kk,$kk);
        $documet->kk = $kk;

        $ijazahFile = $request->file('ijazah');
        $ijazah = time()."_"."ijazah.".$ijazahFile->extension();
        $tujuan_ijazah = 'dokumenuser/pemberdayaan/'.$userId.'/ijazah';
        $ijazahFile->move($tujuan_ijazah,$ijazah);
        $documet->ijazah = $ijazah;

        $surdesFile = $request->file('surdes');
        $surdes = time()."_"."surdes.".$surdesFile->extension();
        $tujuan_surdes = 'dokumenuser/pemberdayaan/'.$userId.'/surdes';
        $surdesFile->move($tujuan_surdes, $surdes);
        $documet->surdes = $surdes;


        $surorFile = $request->file('suror');
        $suror = time()."_"."suor.".$surorFile->extension();
        $tujuan_suror = 'dokumenuser/pemberdayaan/'.$userId.'/suror';
        $surorFile->move($tujuan_suror, $suror);
        $documet->suror = $suror;


        $bukti_hafalanFile = $request->file('bukti_hafalan');
        $bukti_hafalan = time()."_"."buktihafalan.".$bukti_hafalanFile->extension();
        $tujuan_bukti_hafalan = 'dokumenuser/pemberdayaan/'.$userId.'/bukti_hafalan';
        $bukti_hafalanFile->move($tujuan_bukti_hafalan, $bukti_hafalan);
        $documet->bukti_hafalan = $bukti_hafalan;


        $skckFile = $request->file('skck');
        $skck = time()."_"."skck.".$skckFile->extension();
        $tujuan_skck = 'dokumenuser/pemberdayaan/'.$userId.'/skck';
        $skckFile->move($tujuan_skck, $skck);
        $documet->skck = $skck;

//        $sur_ket_hafalanFile = $request->file('sur_ket_hafalan');
//        $sur_ket_hafalan = time()."_".$sur_ket_hafalanFile"-..>$this->$this->extension();
//        $tujuan_sur_ket_hafalan = 'dokumenuser/pemberdayaan/'.$userId.'/sur_ket_hafalan';
//        $sur_ket_hafalanFile->move($tujuan_sur_ket_hafalan, $sur_ket_hafalan);
//        $documet->sur_ket_hafalan = $sur_ket_hafalan;


//        $syahadahFile = $request->file('syahadah');
//        $syahadah = time()."_".$syahadahFile"-..>$this->$this->extension();
//        $tujuan_syahadah = 'dokumenuser/pemberdayaan/'.$userId.'/syahadah';
//        $syahadahFile->move($tujuan_syahadah, $syahadah);
//        $documet->syahadah = $syahadah;

        $cvFile = $request->file('cv');
        $cv = time()."_"."cv.".$cvFile->extension();
        $tujuan_cv = 'dokumenuser/pemberdayaan/'.$userId.'/cv';
        $cvFile->move($tujuan_cv, $cv);
        $documet->cv = $cv;

        $fotoFile = $request->file('foto');
        $foto = time()."_"."foto.".$fotoFile->extension();
        $tujuan_foto = 'dokumenuser/pemberdayaan/'.$userId.'/foto';
        $fotoFile->move($tujuan_foto, $foto);
        $documet->foto = $foto;

        $documet->type = 1;

        if($documet->save()){
            $message = 'Berhasil Upload';
            return redirect('/')->with('alert-success', 'Berhasil Upload');
        }
    }

    public function registerScholarshipPost(Request $request){
        $userId = $request->id;
        $documet = new DocumentModel();

        $documet->nik = $request->nik;
        $documet->school_name = $request->school_name;
        $documet->school_class = $request->school_class;
        $documet->jumlah_hafalan = $request->jumlah_hafalan;
        $documet->user_id = $userId;

        $file = $request->file('ktp');
        $ktp = time()."_"."ktp.".$file->extension();
        $tujuan_ktp = 'dokumenuser/beasiswa/'.$userId.'/ktp';
        $file->move($tujuan_ktp,$ktp);
        $documet->ktp = $ktp;

        $fileKk = $request->file('kk');
        $kk = time()."_"."kk.".$fileKk->extension();
        $tujuan_kk = 'dokumenuser/beasiswa/'.$userId.'/kartu-keluarga';
        $fileKk->move($tujuan_kk,$kk);
        $documet->kk = $kk;

        $ijazahFile = $request->file('ijazah');
        $ijazah = time()."-"."ijazah.".$ijazahFile->extension();
        $tujuan_ijazah = 'dokumenuser/beasiswa/'.$userId.'/ijazah';
        $ijazahFile->move($tujuan_ijazah,$ijazah);
        $documet->ijazah = $ijazah;

        $surdesFile = $request->file('surdes');
        $surdes = time()."-"."surdes.".$surdesFile->extension();
        $tujuan_surdes = 'dokumenuser/beasiswa/'.$userId.'/surdes';
        $surdesFile->move($tujuan_surdes, $surdes);
        $documet->surdes = $surdes;


        $surorFile = $request->file('suror');
        $suror = time()."-"."suror.".$surorFile->extension();
        $tujuan_suror = 'dokumenuser/beasiswa/'.$userId.'/suror';
        $surorFile->move($tujuan_suror, $suror);
        $documet->suror = $suror;


        $bukti_hafalanFile = $request->file('sur_ket_hafalan');
        $bukti_hafalan = time()."-"."sur-ket-hafalan.".$bukti_hafalanFile->extension();
        $tujuan_bukti_hafalan = 'dokumenuser/beasiswa/'.$userId.'/sur-ket-hafalan';
        $bukti_hafalanFile->move($tujuan_bukti_hafalan, $bukti_hafalan);
        $documet->sur_ket_hafalan = $bukti_hafalan;


        $skckFile = $request->file('skck');
        $skck = time()."--"."skck.".$skckFile->extension();
        $tujuan_skck = 'dokumenuser/beasiswa/'.$userId.'/skck';
        $skckFile->move($tujuan_skck, $skck);
        $documet->skck = $skck;

//        $sur_ket_hafalanFile = $request->file('sur_ket_hafalan');
//        $sur_ket_hafalan = time()."_".$sur_ket_hafalanFile"-..>$this->$this->extension();
//        $tujuan_sur_ket_hafalan = 'dokumenuser/beasiswa/'.$userId.'/sur_ket_hafalan';
//        $sur_ket_hafalanFile->move($tujuan_sur_ket_hafalan, $sur_ket_hafalan);
//        $documet->sur_ket_hafalan = $sur_ket_hafalan;


//        $syahadahFile = $request->file('syahadah');
//        $syahadah = time()."_".$syahadahFile"-..>$this->$this->extension();
//        $tujuan_syahadah = 'dokumenuser/beasiswa/'.$userId.'/syahadah';
//        $syahadahFile->move($tujuan_syahadah, $syahadah);
//        $documet->syahadah = $syahadah;

        $cvFile = $request->file('cv');
        $cv = time()."-"."cv.".$cvFile->extension();
        $tujuan_cv = 'dokumenuser/beasiswa/'.$userId.'/cv';
        $cvFile->move($tujuan_cv, $cv);
        $documet->cv = $cv;

        $fotoFile = $request->file('foto');
        $foto = time()."-"."foto.".$fotoFile->extension();
        $tujuan_foto = 'dokumenuser/beasiswa/'.$userId.'/foto';
        $fotoFile->move($tujuan_foto, $foto);
        $documet->foto = $foto;

        $documet->type = 2;

        if($documet->save()){
            $message = 'Berhasil Upload';
            return redirect('/')->with('alert-success', 'Berhasil Upload');
        }


    }

}
