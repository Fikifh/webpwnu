<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(){
        $rows = Banner::all();
        return view('admin.banner.banner', compact('rows'));
    }

    public function viewBanner(Request $request){
        $banner = Banner::find($request->id);
        if($banner){
            $banner->is_show = 1;
            $banner->save();
            return redirect(route('banner'))->with('alert-success', 'Banner Berhasil Ditampilkan');
        }
        return redirect(route('banner'))->with('alert', 'Banner Gagal Ditampilkan');
    }

    public function unViewBanner(Request $request){
        $banner = Banner::find($request->id);
        if($banner){
            $banner->is_show = 0;
            $banner->save();
            return redirect(route('banner'))->with('alert-success', 'Banner Berhasil Disembunyikan');
        }
        return redirect(route('banner'))->with('alert', 'Banner Gagal Disembunyikan');
    }

    public function delete(Request $request){
        $banner = Banner::destroy($request->id);
        if($banner){
            return redirect(route('banner'))->with('alert-success', 'Banner Berhasil Dihapus');
        }
        return redirect(route('banner'))->with('alert', 'Banner Gagal Dihapus');
    }

    public function updateBanner(Request $request){
        $banner = Banner::find($request->query('id'));
        if($banner){
            if(!empty($request->is_image_edit)){
                $banner->image = $this->uploadImage($request, 'image', 'files/admin/banners');
            }
            $banner->title = $request->title;
            $banner->is_show = empty($request->query('status')) ? 0:1;
            $banner->save();
            return redirect(route('banner'))->with('alert-success', 'Banner Berhasil Diupdate');
        }
        return redirect(route('banner'))->with('alert', 'Banner Gagal Diupdate');
    }
    public function getEdit($id){
        $rows = Banner::find($id);
        if($rows){
            return view('admin.banner.editbanner', compact('rows'));
        }
        return view('admin.banner.editbanner', compact('rows'))->with('alert','ID Tidak ditemukan !');
    }

    public function addBanner(Request $request, Banner $banner){
        $status = 1;
        if(empty($request->status)){
            $status = 0;
        }
        $banner->title = $request->title;
        $banner->image = $this->uploadImage($request, 'image', 'files/admin/banners');
        $banner->is_show = $status;
        if($banner->save()){
            return redirect(route('banner'))->with('alert-success', 'Berhasil Menambahkan');
        }
        return redirect(route('banner'))->with('alert', 'Gagal Menambahkan !');
    }

    public function deleteImage($image_path){
        if(File::exists($image_path)) {
            File::delete($image_path);
            return true;
        }
        return false;
    }
}
