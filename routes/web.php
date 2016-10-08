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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tiny', function() {
    return view('tiny-test');
});

Route::get('/tiny-image-manager', function() {
    return view('tiny-image-manager');
});

Route::get('/jai-backend', function() {
    return view('backend.dashboard');
});
