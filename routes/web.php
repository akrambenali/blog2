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

Route::get('logout','\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/', 'ArticleController@index')->name('pages.index');
Route::get('/about', 'PageController@about')->name('pages.about');
Route::post('newsletter', 'NewsletterController@store')->name('newsletter.store');
Route::resource('articles', 'ArticleController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('login.github');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');


