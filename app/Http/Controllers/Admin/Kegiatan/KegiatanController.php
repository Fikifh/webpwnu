<?php

namespace App\Http\Controllers\Admin\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index(Request $request){
        $kegitan = Article::join('categories', 'categories.id', 'articles.categories_id')
            ->where('categories.name', 'kegiatan')
            ->paginate(10);
        return view('admin.kegiatan.kegiatan', compact('kegitan'));
    }
    public function store(Request $request, Article $article){
        $link = preg_replace("/[^a-zA-Z0-9]/", "-", $request->judul);
        $article->categories_id = 1;
        $article->title = $request->judul;
        $article->content = $request->content_kegiatan;
        $article->image = $this->uploadImage($request, 'image', 'files/kegiatan');
        $article->is_show = 1;
        $article->writer = $request->user()->name;
        $article->is_top = !empty($request->is_top) ? 1:0;
        $article->link = $link;
        if($article->save()){
            return redirect(route('kegiatan.add'))->with('alert-success', 'Kegiatan Berhasil Diposting');
        }
        return redirect(route('kegiatan.add'))->with('alert', 'Kegiatan Gagal Diposting');
    }
}
