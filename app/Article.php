<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use Cache;

class Article extends Model
{

    protected $casts = [
        'published_at' => 'datetime',
    ];
    //  champs autoriser CRUD
    protected $fillable = ['title','sub_title','slug','body', 'published_at','image' ];


    //protected $with = ['user'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public  function  user() {
        return $this->belongsTo(User::class);
    }
    public function getDatePublicationAttribute()
    {

        // return  $this->published_at->format('d/m/y');
        Carbon::setLocale('fr');
        return  $this->published_at->diffForHumans();
    }

    public function scopeRecherche($query, $word){

        $query->where('title', 'like', "%$word%")->orWhere('sub_title', 'like', "%$word%")->orWhere('body', 'like', "%$word%");

    }


    public function getTitleSearchedAttribute(){

        return str_replace(request('q'), '<mark>'. request('q') . '</mark>', $this->title) ;
    }
    public function getSubTitleSearchedAttribute()
    {

        return str_replace(request('q'), '<mark>' . request('q') . '</mark>', $this->title);
    }

    public function setSlugAttribute()
    {

        $this->attributes['slug']= \Str::slug($this->title);
    }

    public function setImageAttribute()
    {
        $img = Image::make(request('image')->getRealPath())->fit(1440, 470);

        $image_name = 'images/' . time() . '-' . request('image')->getClientOriginalName();

        Storage::put($image_name, (string) $img->encode());

        $this->attributes['image'] = $image_name ;
    }

    public function scopeHome($q) {

        $words = request('q');
        $page  = request('page',1);

        return  Cache::tags(['articles','homepage'])->remember("article-home-$page-$words", 60*20 , function () use($q,$words) {
            return $q->Recherche($words)
                ->latest('id')
                ->with('user')
                ->paginate(20);
        });

    }
}
