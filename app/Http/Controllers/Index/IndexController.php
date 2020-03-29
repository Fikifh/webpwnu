<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Banner;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request){
        $banners = Banner::where('is_show', 1)->get();
        $toparticles = Article::where('is_top', 1)->paginate(6);
        $articles = Article::where('is_show', 1)->paginate(20);
        return view('user.parent.index', compact('banners','toparticles', 'articles'));
    }
}
