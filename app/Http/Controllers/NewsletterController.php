<?php

namespace App\Http\Controllers;
use App\Newsletter;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class NewsletterController extends Controller
{

    public function store()
    {
        //dd(1);
         request()->validate([
            'mail' => 'required|email|unique:newsletters,mail',
        ]);

        Newsletter::create(request()->all());

        alert('Newsletter', 'Votre Email est dans la Newsletter', 'success');


        return back();

    }
}
