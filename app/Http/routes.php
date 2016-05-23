<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');


Route::resource('user/joc','UserJocController');

Route::resource('joc','JocController',[ 'only'=>['index','show'] ]);

Route::resource('joc/comentari','JocComentariController',[ 'except'=>['show','edit','create']]);

Route::resource('comentari','ComentariController',[ 'only'=>['index','show'] ]);