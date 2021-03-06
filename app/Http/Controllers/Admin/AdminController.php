<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ParticipantExport;
use App\Exports\ParticipantSchoolarshipExport;
use App\Http\Controllers\Controller;
use App\models\scholarship\DocumentModel;
use App\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use ZipArchive;
use File;
use Barryvdh\DomPDF\Facade as PDF;

class AdminController extends Controller
{
    public function index(){
        $user = DocumentModel::where('type', 1)->paginate(10);
        return view('admin.Parent.dashboard', compact('user'));
    }
    public function list(Request $request){
        $type = $request->type;
        $user = DocumentModel::where('type', $type)->paginate(10);
        return view('admin_home', compact('user'));
    }
    public function search(Request $request){
        $query = $request->search;
        $user = DocumentModel::join('users', 'documents.user_id', 'users.id')->where('users.name', 'like', '%'.$query.'%')->paginate(10);
        return view('admin_home', compact('user'));
    }
    public function exportPemberdayaanToExcel(){
        return Excel::download(new ParticipantExport(), 'peserta-pemberdayaan.xlsx');
    }
    public function exportScholarshipToExcel(){
        return Excel::download(new ParticipantSchoolarshipExport(), 'peserta-beasiswa.xlsx');
    }

    public function printToPdf($id){
        $participant = DocumentModel::where('user_id', $id)->join('users', 'users.id', 'documents.user_id')->first();
//        return view('print.participant_pdf', compact('participant'));
        $pdf = PDF::loadView('print.participant_pdf', ['participant' => $participant])->setPaper('a4', 'portrait');;
//        return $pdf->stream();
        return $pdf->download($id.'-'.$participant->name);
    }

    public function printToPrinter($id){
        $participant = DocumentModel::where('user_id', $id)->join('users', 'users.id', 'documents.user_id')->first();
        return view('print.participant_print', compact('participant'));
    }

    public function detailUser($id){
        $userData = DocumentModel::where('user_id', $id)->first();
        return view('admin.document_detail', compact('userData'));
    }

    public function downloadZip($id, $name){
        $document = DocumentModel::where('user_id', $id)->first();
        $type = '';
        if($document->type == 1){
            $type = 'pemberdayaan';
        } else {
            $type = 'beasiswa';
        }

        $zip_file = Carbon::now()->toDateString().'-'.$id.'-'.$name;
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $path = public_path('dokumenuser/'.$type.'/'.$id);
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($files as $name => $file)
        {
            // We're skipping all subfolders
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();

                // extracting filename with substr/strlen
                $relativePath = 'dokumenuser/'.$type.'/'. substr($filePath, strlen($path) + 1);

                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        return response()->download($zip_file);
    }

    public function downloadall(){
        $zip_file = Carbon::now()->toDateString();
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $path = public_path('dokumenuser');
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($files as $name => $file)
        {
            // We're skipping all subfolders
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();

                // extracting filename with substr/strlen
                $relativePath = 'dokumenuser/'. substr($filePath, strlen($path) + 1);

                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        return response()->download($zip_file);
    }
}


