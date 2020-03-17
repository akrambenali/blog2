<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class PageController extends Controller
{
    //

    public function index(){
        $q = request('q');
        $articles = Article::Recherche($q)->latest('title')->paginate(20);
        return view('pages.index', compact('articles'));
    }

    public function about()
    {

        return view('pages.about');
    }

    public function showArticle($slug)
    {

         // return $slug;
         $article = Article::where('slug',$slug)->first();
         //dd($article);
         return view('articles.show', compact('article'));
    }
}
