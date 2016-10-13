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

Route::group(['prefix' => $backendUrl, 'middleware' => ['menu','auth','authorize']], function () {
    Route::get('/', function ()    {
        // Uses Auth Middleware
        return view('backend.dashboard');
    })->name('dashboard');

    // User
    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/user/add', 'UserController@create')->name('user.add');
    Route::post('/user/save', 'UserController@store')->name('user.add');
    Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::post('/user/{id}/update', 'UserController@update')->name('user.edit');
    Route::get('/user/{id}/delete', 'UserController@destroy')->name('user.delete');

    // Role
    Route::get('/role', 'RoleController@index')->name('role');
    Route::get('/role/add', 'RoleController@create')->name('role.add');
    Route::post('/role/save', 'RoleController@store')->name('role.add');
    Route::get('/role/{id}/edit', 'RoleController@edit')->name('role.edit');
    Route::post('/role/{id}/update', 'RoleController@update')->name('role.edit');
    Route::get('/role/{id}/delete', 'RoleController@destroy')->name('role.delete');

    // Permission
    Route::get('/permission', 'PermissionController@index')->name('permission');
    Route::get('/permission/add', 'PermissionController@create')->name('permission.add');
    Route::post('/permission/save', 'PermissionController@store')->name('permission.add');
    Route::get('/permission/{id}/edit', 'PermissionController@edit')->name('permission.edit');
    Route::post('/permission/{id}/update', 'PermissionController@update')->name('permission.edit');
    Route::get('/permission/{id}/delete', 'PermissionController@destroy')->name('permission.delete');

    // Category
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::get('/category/add', 'CategoryController@create')->name('category.add');
    Route::post('/category/save', 'CategoryController@store')->name('category.add');
    Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
    Route::post('/category/{id}/update', 'CategoryController@update')->name('category.edit');
    Route::get('/category/{id}/delete', 'CategoryController@destroy')->name('category.delete');
});


Route::group(['prefix' => $backendUrl, 'middleware' => ['auth']], function () {
    Route::get('/user-data', 'UserController@anyData')->name('user.data' );
    Route::get('/role-data', 'RoleController@anyData')->name('role.data' );
    Route::get('/permission-data', 'PermissionController@anyData')->name('permission.data' );
    Route::get('/category-data', 'CategoryController@anyData')->name('category.data' );

    Route::post('/get-slug/{model}', function(\Illuminate\Http\Request $request, $model) {
        $title = $request->input('title');
        return getSlugOnModelByTitle($title, $model);
    });

    Route::get('/test-slug/{model}/{title}', function($model, $title) {
        return getSlugOnModelByTitle($title, $model);
    });

});