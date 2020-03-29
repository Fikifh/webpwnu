<?php

namespace App\Http\Controllers\Admin\Informasi;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index(Request $request){
        $informasi = Article::join('categories', 'categories.id', 'articles.categories_id')
            ->where('categories.name', 'informasi')
            ->where('is_show', 1)
            ->paginate(10);
        return view('admin.informasi.informasi', compact('informasi'));
    }
    public function store(Request $request, Article $article){
        $link = preg_replace("/[^a-zA-Z0-9]/", "-", $request->judul);
        $article->categories_id = 2;
        $article->title = $request->judul;
        $article->content = $request->content_kegiatan;
        $article->image = $this->uploadImage($request, 'image', 'files/informasi');
        $article->is_show = 1;
        $article->writer = $request->user()->name;
        $article->is_top = !empty($request->is_top) ? 1:0;
        $article->link = $link;
        if($article->save()){
            return redirect(route('informasi.get.add'))->with('alert-success', 'Informasi Berhasil Diposting');
        }
        return redirect(route('informasi.get.add'))->with('alert', 'Informasi Gagal Diposting');
    }
}
