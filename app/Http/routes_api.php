<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 24/05/16
 * Time: 16:41
 */

Route::resource('user/joc','UserJocController');

Route::resource('joc','JocController',[ 'only'=>['index','show'] ]);

Route::resource('joc/comentari','JocComentariController',[ 'except'=>['show','edit','create']]);

Route::resource('comentari','ComentariController',[ 'only'=>['index','show'] ]);