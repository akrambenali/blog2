<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ArticleController extends Controller
{



    public function __construct()
    {
        $this->middleware(['auth', 'checkRole'])->only('create','store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // alert('Title', 'Lorem Lorem Lorem', 'success');

        $articles = Article::home();

       // $articles->load('user');
        return view('articles.index', compact('articles'));
        return View('articles.index')->withArticles($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(auth()->id());
       request()->validate([
           'title'=> 'required|min:6|max:255',
           'sub_title' => 'required',
           'published_at' => 'required|date',
           'body' => 'required',
           'image' => 'image',
       ]);

       $article =  auth()->user()->articles()->create(request()->all()+ ['slug'=> \Str::slug(request('title'))]);
       return redirect()->route('articles.show',$article);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        // return $slug;
       // $article = Article::where('slug', $slug)->first();
        //dd($article);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
