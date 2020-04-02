<?php

namespace App\Http\Controllers\Admin\UploadFileFdf;

use App\Http\Controllers\Controller;
use App\Models\MasterFile;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class UploadFileFdfController extends Controller
{
    public function index()
    {
        $files = MasterFile::paginate(25);
        return view('admin.uploadpdf.man_upload_files', compact('files'));
    }

    public function updloadFile(Request $request, MasterFile $masterFile)
    {
        $fileUploaded = $this->uploadImage($request, "file", 'files');
        $infoPath = pathinfo(public_path() . $fileUploaded);
        $extension = $infoPath['extension'];

        $masterFile->name = $request->name;
        $masterFile->description = $request->desc;
        $masterFile->extension = $extension;
        $masterFile->is_show = empty($request->is_show) ? 1 : 0;
        $masterFile->file = $fileUploaded;
        $masterFile->save();
        return redirect(route('files.get'));
    }

    public function download(Request $request)
    {
        $path = $request->path_file;
        $name = $request->name_file;
        $infoPath = pathinfo(public_path() . "/".$path."/".$name);
        $extension = $infoPath['extension'];
        $file = public_path() . "/".$path."/".$name;
        $headers = array(
            'Content-Type: application/'.$extension,
        );
        return \response()->download($file, $name, $headers);
    }

    public function deleteFile(Request $request){
        $path = $request->path_file;
        $masterFile = MasterFile::find($request->id);
        $file = public_path() . "/".$path."/".$masterFile->file;
        if(file_exists($file)){
            File::delete($file);
            $masterFile->delete();
            return redirect()->back()->with('alert-success', 'File tidak ditemukan!');;
        }
        return redirect()->back()->with('alert', 'File tidak ditemukan!');
    }
    public function hideFile(Request $request){
        $masterFile = MasterFile::find($request->id);
        $masterFile->is_show = $masterFile->is_show == 1 ? 0:1;
        $masterFile->save();
        return redirect(route('files.get'));
    }
}
