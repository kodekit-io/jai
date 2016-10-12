<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/tiny', function() {
    return view('tiny-test');
});

Route::get('/tiny-image-manager', function() {
    return view('tiny-image-manager');
});

Auth::routes();

Route::group(['prefix' => 'jai-backend', 'middleware' => ['menu','auth']], function () {
    Route::get('/', function ()    {
        // Uses Auth Middleware
        return view('backend.dashboard');
    });
});
