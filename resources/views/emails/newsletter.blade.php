@component('mail::message')
# Newsletter de la semaine

The body of your message.

## Liste des articles
<ul class="justify-content-center">
    @foreach ($articles as $article)
     <li class="nav-item">
        <a class="nav-link" href="{{ route('articles.show', $article)}}">{{$article->title}}</a>
     </li>
    @endforeach

</ul>


Merci,<br>
{{ config('app.name') }}
@endcomponent
