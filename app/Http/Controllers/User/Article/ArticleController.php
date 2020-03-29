<?php

namespace App\Http\Controllers\User\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function articleByLink(Request $request){
        $article = Article::where('link', $request->link)
            ->where('is_show', 1)
            ->first();
        $articles = Article::whereNotIn('id', [$article->id])
            ->where('is_show', 1)
            ->orderBy('created_at', 'ASC')
            ->paginate(5);
        return view('user.artikel.artikel_show', compact('article', 'articles'));
    }
}
