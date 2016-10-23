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


use Illuminate\Support\Facades\Log;

$backendUrl = config('misc.backend.url');

Auth::routes();

Route::group(['prefix' => $backendUrl, 'middleware' => ['menu','auth','authorize']], function () {
    Route::get('/', function ()    {
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

    // Post Type
    Route::get('/post-type', 'PostTypeController@index')->name('post-type');
    Route::get('/post-type/add', 'PostTypeController@create')->name('post-type.add');
    Route::post('/post-type/save', 'PostTypeController@store')->name('post-type.add');
    Route::get('/post-type/{id}/edit', 'PostTypeController@edit')->name('post-type.edit');
    Route::post('/post-type/{id}/update', 'PostTypeController@update')->name('post-type.edit');
    Route::get('/post-type/{id}/delete', 'PostTypeController@destroy')->name('post-type.delete');

    // Post Category
    Route::get('/post-category/{postType}', 'CategoryController@index')->name('post-category');
    Route::get('/post-category/{postType}/add', 'CategoryController@create')->name('post-category.add');
    Route::post('/post-category/{postType}/save', 'CategoryController@store')->name('post-category.add');
    Route::get('/post-category/{postType}/{id}/edit', 'CategoryController@edit')->name('post-category.edit');
    Route::post('/post-category/{postType}/{id}/update', 'CategoryController@update')->name('post-category.edit');
    Route::get('/post-category/{postType}/{id}/delete', 'CategoryController@destroy')->name('post-category.delete');
    Route::get('/post-category/{postType}/{id}/transfer', 'CategoryController@transfer')->name('post-category.delete');
    Route::post('/post-category/{postType}/{id}/transfer', 'CategoryController@transferThenDelete')->name('post-category.delete');

    // Post
    Route::get('/post', 'PostController@index')->name('post');
    Route::get('/post/add', 'PostController@create')->name('post.add');
    Route::post('/post/save', 'PostController@store')->name('post.add');
    Route::get('/post/{id}/edit', 'PostController@edit')->name('post.edit');
    Route::post('/post/{id}/update', 'PostController@update')->name('post.edit');
    Route::get('/post/{id}/delete', 'PostController@destroy')->name('post.delete');

    // What's on
    Route::get('/whats-on', 'WhatsOnController@index')->name('whats-on');
    Route::get('/whats-on/add', 'WhatsOnController@create')->name('whats-on.add');
    Route::post('/whats-on/save', 'WhatsOnController@store')->name('whats-on.add');
    Route::get('/whats-on/{id}/edit', 'WhatsOnController@edit')->name('whats-on.edit');
    Route::post('/whats-on/{id}/update', 'WhatsOnController@update')->name('whats-on.edit');
    Route::get('/whats-on/{id}/delete', 'WhatsOnController@destroy')->name('whats-on.delete');
});


// prevent another menu generation
Route::group(['prefix' => $backendUrl, 'middleware' => ['auth']], function () {
    Route::get('/user-data', 'UserController@anyData')->name('user.data' );
    Route::get('/role-data', 'RoleController@anyData')->name('role.data' );
    Route::get('/permission-data', 'PermissionController@anyData')->name('permission.data' );
    Route::get('/post-category-data/{postTypeId}', 'CategoryController@anyData')->name('post-category.data' );
    Route::get('/post-data', 'PostController@anyData')->name('post.data' );
    Route::get('/post-type-data', 'PostTypeController@anyData')->name('post-type.data' );

    Route::post('/get-slug/{model}', function(\Illuminate\Http\Request $request, $model) {
        $title = $request->input('title');
        return getSlugOnModelByTitle($title, $model);
    });

    Route::get('/tiny-image-manager', function() {
        return view('backend.file-manager');
    });

    Route::post('/upload-image', 'MediaController@saveImage');

    Route::post('upload-image-handler', 'MediaController@uploadImageHandler');

    Route::post('get-images', 'MediaController@getMedia');

});



Route::group(['middleware' => ['lang']], function () {
    Route::get('/{lang?}', 'FrontEndController@homepage');
    Route::get('/{lang?}/news/{slug}', 'FrontEndController@homepage');
});