<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadImage(Request $request, $fileName,  $path){
        $file = $request->file($fileName);
        $uploadedFileName = time()."_".$fileName.".".$file->getClientOriginalExtension();
        $file->move($path,  $uploadedFileName);
        return $uploadedFileName;
    }
}
