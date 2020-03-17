<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('default');
}); */

Route::get('/','PageController@index')->name('pages.index');
Route::get('/about', 'PageController@about')->name('pages.about');
Route::get('{slug}', 'PageController@showArticle')->name('pages.show-article');
