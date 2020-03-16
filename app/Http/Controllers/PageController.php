<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class PageController extends Controller
{
    //

    public function index(){

        $articles = Article::all();
        return view('pages.index', compact('articles'));
    }

    public function about()
    {

        return view('pages.about');
    }
}
