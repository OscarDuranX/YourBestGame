<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 24/05/16
 * Time: 16:41
 */


Route::group(['middleware' => 'cors'], function(){
//    Route::resource('joc','JocController',[ 'only'=>['index'] ]);
//    Route::post('api/login','Auth\AuthController@ApiLogin');


    Route::resource('user/joc','UserJocController');

    Route::resource('joc/comentari','JocComentariController',[ 'except'=>['show','edit','create']]);

    Route::resource('comentari','ComentariController',[ 'only'=>['index','show'] ]);


});