<?php

Route::group(['middleware' => 'web', 'prefix' => 'api', 'namespace' => 'Modules\Api\Http\Controllers'], function()
{
    Route::get('/', 'ApiController@index');
    Route::get('test', 'UserController@index');
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    Route::group([
        'middleware' => 'web'
    ], function() {
        Route::get('logout', 'UserController@logout');
        Route::get('user', 'UserController@user');
    });
});
