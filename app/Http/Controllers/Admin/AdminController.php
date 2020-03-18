<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\scholarship\DocumentModel;
use App\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use ZipArchive;
use File;
use Barryvdh\DomPDF\Facade as PDF;

class AdminController extends Controller
{
    public function printToPdf($id){
        $participant = DocumentModel::where('user_id', 4)->join('users', 'users.id', 'documents.user_id')->first();
//        return view('print.participant_pdf', compact('participant'));
        $pdf = PDF::loadView('print.participant_pdf', ['participant' => $participant]);
        $pdf->setPaper('A4', 'portrait');
//        return $pdf->stream();
        return $pdf->download($id.'-'.$participant->name);
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

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $users = DocumentModel::join('users', 'user.id', 'documents.id')
                ->where('users.name', 'LIKE', '%'.$request->search.'%')->get();
            if ($users) {
                foreach ($users as $key => $data) {
                    $output =  '<tr>' .
                        '<td>'.$data->id.'</td>'.
                        '<td>'.$data->name.'</td>'.
                        '<td>'.$data->nik.'</td>'.
                        '<td>'.$data->email.'</td>'.
                        '<td>'.$data->gender.'</td>'.
                        '<td>'.$data->birth_place.', '.$data->birth_day.'</td>'.
                        '<td>'.$data->address.'</td>'.
                        '<td>'.$data->phone.'</td>'.
                        '<td>'.$data->education.'</td>'.
                        '<td>'.$data->jumlah_hafalan.'</td>';

                }
                return Response($output);
            }
        }
    }
}


