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

$backendUrl = config('misc.backend.url');

Route::get('/tiny', function() {
    return view('tiny-test');
});

Route::get('/tiny-image-manager', function() {
    return view('tiny-image-manager');
});

Auth::routes();

Route::group(['prefix' => $backendUrl, 'middleware' => ['menu','auth']], function () {
    Route::get('/', function ()    {
        // Uses Auth Middleware
        return view('backend.dashboard');
    });

    // User
    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/user/add', 'UserController@create')->name('user.add');
    Route::post('/user/save', 'UserController@store')->name('user.save');
    Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::post('/user/{id}/update', 'UserController@update')->name('user.update');
    Route::get('/user/{id}/delete', 'UserController@destroy')->name('user.delete');

    // Role
    Route::get('/role', 'RoleController@index')->name('role');
    Route::get('/role/add', 'RoleController@create')->name('role.add');
    Route::post('/role/save', 'RoleController@store')->name('role.save');
    Route::get('/role/{id}/edit', 'RoleController@edit')->name('role.edit');
    Route::post('/role/{id}/update', 'RoleController@update')->name('role.update');
    Route::get('/role/{id}/delete', 'RoleController@destroy')->name('role.delete');

    // Permission
    Route::get('/permission', 'PermissionController@index')->name('permission');
    Route::get('/permission/add', 'PermissionController@create')->name('permission.add');
    Route::post('/permission/save', 'PermissionController@store')->name('permission.save');
    Route::get('/permission/{id}/edit', 'PermissionController@edit')->name('permission.edit');
    Route::post('/permission/{id}/update', 'PermissionController@update')->name('permission.update');
    Route::get('/permission/{id}/delete', 'PermissionController@destroy')->name('permission.delete');
});


Route::group(['prefix' => $backendUrl, 'middleware' => ['auth']], function () {
    Route::get('/user-data', 'UserController@anyData')->name('user.data' );
    Route::get('/role-data', 'RoleController@anyData')->name('role.data' );
    Route::get('/permission-data', 'PermissionController@anyData')->name('permission.data' );
});