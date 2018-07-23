<?php

Route::group(
    [
        'namespace'  => '\Laravolt\Envi\Http\Controllers',
        'middleware' => ['web', 'auth'],
        'prefix'     => 'envi',
        'as'         => 'envi::',
    ],
    function () {
        Route::get('envi', [
            'as' => 'edit',
            'uses' => 'EnviController@edit'
        ]);

        Route::put('envi', [
           'as' => 'update',
           'uses' => 'EnviController@update'
        ]);

        //Route::resource('envi', 'EnviController');
    }
);