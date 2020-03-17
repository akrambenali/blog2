<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $casts = [
        'published_at' => 'datetime',
    ];
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
}
