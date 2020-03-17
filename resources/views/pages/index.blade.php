@extends('default')

@section('content')

    <div class="container">

    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
          <form class="form-inline"  action="">
            <input class="form-control" type="search" name="q" placeholder="Rechercher...." value="{{ request('q')}}">
             <button class="btn btn-info"><i class="fas fa-search"></i></button>
          </form>
          @foreach ($articles as $article )
               <div class="post-preview">
          <a href="{{ route('pages.show-article', $article->slug)}}">
            <h2 class="post-title">
             {{$loop->iteration}} -
             {!! $article->title_searched !!}
            </h2>
            <h3 class="post-subtitle">
              {!! $article->sub_title_searched !!}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{$article->user->name}}</a>
            on  {{$article->date_publication}}</p>
        </div>
        <hr>
          @endforeach

        <!-- Pager -->
        <div class="text-center">
            {{ $articles->appends(request()->all())->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection
