<?php


namespace App\Http\Controllers\User\Downloads;


use App\Http\Controllers\Controller;
use App\Models\MasterFile;

class DownloadController extends Controller
{
    public function index(){
        $downloads = MasterFile::where('is_show', 1)->get();
        return view('user.download.download', compact('downloads'));
    }
}
