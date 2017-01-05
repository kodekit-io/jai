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

Route::group(['prefix' => $backendUrl, 'middleware' => ['menu:backend','auth','authorize']], function () {
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

    // Attraction
    Route::get('/attraction', 'AttractionController@index')->name('attraction');
    Route::get('/attraction/add', 'AttractionController@create')->name('attraction.add');
    Route::post('/attraction/save', 'AttractionController@store')->name('attraction.add');
    Route::get('/attraction/{id}/edit', 'AttractionController@edit')->name('attraction.edit');
    Route::post('/attraction/{id}/update', 'AttractionController@update')->name('attraction.edit');
    Route::get('/attraction/{id}/delete', 'AttractionController@destroy')->name('attraction.delete');

    // Media Room
    Route::get('/media-room', 'MediaRoomController@index')->name('media-room');
    Route::get('/media-room/add', 'MediaRoomController@create')->name('media-room.add');
    Route::post('/media-room/save', 'MediaRoomController@store')->name('media-room.add');
    Route::get('/media-room/{id}/edit', 'MediaRoomController@edit')->name('media-room.edit');
    Route::post('/media-room/{id}/update', 'MediaRoomController@update')->name('media-room.edit');
    Route::get('/media-room/{id}/delete', 'MediaRoomController@destroy')->name('media-room.delete');

    // Slider
    Route::get('/slider', 'SliderController@index')->name('slider');
    Route::get('/slider/add', 'SliderController@create')->name('slider.add');
    Route::post('/slider/save', 'SliderController@store')->name('slider.add');
    Route::get('/slider/{id}/edit', 'SliderController@edit')->name('slider.edit');
    Route::post('/slider/{id}/update', 'SliderController@update')->name('slider.edit');
    Route::get('/slider/{id}/delete', 'SliderController@destroy')->name('slider.delete');

    // News
    Route::get('/news', 'NewsController@index')->name('news');
    Route::get('/news/add', 'NewsController@create')->name('news.add');
    Route::post('/news/save', 'NewsController@store')->name('news.add');
    Route::get('/news/{id}/edit', 'NewsController@edit')->name('news.edit');
    Route::post('/news/{id}/update', 'NewsController@update')->name('news.edit');
    Route::get('/news/{id}/delete', 'NewsController@destroy')->name('news.delete');

    // Package
    Route::get('/package', 'PackageController@index')->name('package');
    Route::get('/package/add', 'PackageController@create')->name('package.add');
    Route::post('/package/save', 'PackageController@store')->name('package.add');
    Route::get('/package/{id}/edit', 'PackageController@edit')->name('package.edit');
    Route::post('/package/{id}/update', 'PackageController@update')->name('package.edit');
    Route::get('/package/{id}/delete', 'PackageController@destroy')->name('package.delete');

    // What's on
    Route::get('/whats-on', 'WhatsOnController@index')->name('whats-on');
    Route::get('/whats-on/add', 'WhatsOnController@create')->name('whats-on.add');
    Route::post('/whats-on/save', 'WhatsOnController@store')->name('whats-on.add');
    Route::get('/whats-on/{id}/edit', 'WhatsOnController@edit')->name('whats-on.edit');
    Route::post('/whats-on/{id}/update', 'WhatsOnController@update')->name('whats-on.edit');
    Route::get('/whats-on/{id}/delete', 'WhatsOnController@destroy')->name('whats-on.delete');

    // Holiday
    Route::get('/holiday', 'HolidayController@index')->name('holiday');
    Route::get('/holiday/add', 'HolidayController@create')->name('holiday');
    Route::post('/holiday/save', 'HolidayController@store')->name('holiday');
    Route::get('/holiday/{id}/edit', 'HolidayController@edit')->name('holiday');
    Route::post('/holiday/{id}/update', 'HolidayController@update')->name('holiday');
    Route::get('/holiday/{id}/delete', 'HolidayController@destroy')->name('holiday');

    // Showtime
    Route::get('/showtime', 'ShowTimeController@index')->name('showtime');
    Route::get('/showtime/add', 'ShowTimeController@create')->name('showtime');
    Route::post('/showtime/save', 'ShowTimeController@store')->name('showtime');
    Route::get('/showtime/{id}/edit', 'ShowTimeController@edit')->name('showtime');
    Route::post('/showtime/{id}/update', 'ShowTimeController@update')->name('showtime');
    Route::get('/showtime/{id}/delete', 'ShowTimeController@destroy')->name('showtime');

    // Career
    Route::get('/career', 'CareerController@index')->name('career');
    Route::get('/career/add', 'CareerController@create')->name('career');
    Route::post('/career/save', 'CareerController@store')->name('career');
    Route::get('/career/{id}/edit', 'CareerController@edit')->name('career');
    Route::post('/career/{id}/update', 'CareerController@update')->name('career');
    Route::get('/career/{id}/delete', 'CareerController@destroy')->name('career');

    // Page
    Route::get('/page', 'PageController@index')->name('page');
    Route::get('/page/add', 'PageController@create')->name('page.add');
    Route::post('/page/save', 'PageController@store')->name('page.add');
    Route::get('/page/{id}/edit', 'PageController@edit')->name('page.edit');
    Route::post('/page/{id}/update', 'PageController@update')->name('page.edit');
    Route::get('/page/{id}/delete', 'PageController@destroy')->name('page.delete');

    // General Setting
    Route::get('/general-setting', 'GeneralSettingController@index')->name('setting');
    Route::post('/general-setting', 'GeneralSettingController@save')->name('setting');
});


// prevent another menu generation
Route::group(['prefix' => $backendUrl, 'middleware' => ['auth']], function () {
    Route::get('/user-data', 'UserController@anyData')->name('user.data');
    Route::get('/role-data', 'RoleController@anyData')->name('role.data');
    Route::get('/holiday-data', 'HolidayController@anyData')->name('holiday.data');
    Route::get('/showtime-data', 'ShowTimeController@anyData')->name('showtime.data');
    Route::get('/career-data', 'CareerController@anyData')->name('career.data');
    Route::get('/permission-data', 'PermissionController@anyData')->name('permission.data');
    Route::get('/post-category-data/{postTypeId}', 'CategoryController@anyData')->name('post-category.data');
    Route::get('/post-data', 'PostController@anyData')->name('post.data');
    Route::get('/page-data', 'PageController@anyData')->name('page.data');
    Route::get('/attraction-data', 'AttractionController@anyData')->name('attraction.data');
    Route::get('/media-room-data', 'MediaRoomController@anyData')->name('media-room.data');
    Route::get('/package-data', 'PackageController@anyData')->name('package.data');
    Route::get('/news-data', 'NewsController@anyData')->name('news.data' );
    Route::get('/slider-data', 'SliderController@anyData')->name('slider.data');
    Route::get('/post-type-data', 'PostTypeController@anyData')->name('post-type.data');

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


Route::group(['middleware' => ['lang', 'menu:frontend']], function () {
    Route::get('/{lang?}/about-us', 'FrontEndController@aboutUs');
    Route::get('/{lang?}/ticket-hours', 'TicketController@ticket');
    Route::post('/{lang?}/book-detail', 'TicketController@bookTicket');
    Route::get('/{lang?}/book-detail/{orderId?}', 'TicketController@bookTicket');
    Route::get('/{lang?}/special-packages', 'FrontEndController@specialPackages');
    Route::get('/{lang?}/show-time', 'FrontEndController@showTime');
    Route::get('/{lang?}/location', 'FrontEndController@location');
    Route::get('/{lang?}/news', 'FrontEndController@news');
    Route::get('/{lang?}/news/{slug}', 'FrontEndController@newsDetail');
    Route::get('/{lang?}/attractions-experience', 'FrontEndController@attractions');
    Route::get('/{lang?}/education', 'FrontEndController@education');
    Route::get('/{lang?}/conservation', 'FrontEndController@conservation');
    Route::get('/{lang?}/location-map', 'FrontEndController@locationMap');
    Route::get('/{lang?}/career', 'FrontEndController@career');
    Route::get('/{lang?}/media-room', 'MediaRoomFrontEndController@mediaRoom');
    Route::get('/{lang?}/media-room/{slug}', 'MediaRoomFrontEndController@mediaRoomDetails');
    Route::get('/{lang?}/privacy-policy', 'FrontEndController@privacy');
    Route::get('/{lang?}/term-use', 'FrontEndController@term');
    Route::get('/{lang?}/search-result', 'FrontEndController@search');
    Route::get('/{lang?}/promo', 'FrontEndController@promo');

    Route::get('/{lang?}/thank-you', 'FrontEndController@thankYou');
    Route::get('/{lang?}/test-print', 'FrontEndController@testPrint');

    Route::get('/{lang?}', 'FrontEndController@homePage');
//    Route::get('/{lang?}/news/{slug}', 'FrontEndController@homePage');
});

Route::post('get-package-by-date', 'TicketController@getAvailablePackages');

Route::group(['middleware' => ['menu:frontend']], function () {
    Route::any('doku/result', 'PaymentController@dokuResult');
    Route::any('doku/notify', 'PaymentController@dokuNotify');
    Route::any('doku/review', 'PaymentController@dokuReview');
    Route::any('doku/identify', 'PaymentController@dokuIdentify');

    Route::any('cimb/result', 'PaymentController@cimbResult');
    Route::any('cimb/backend', 'PaymentController@cimbBackend');
});

Route::get('galasys/products', 'GalasysController@products');
Route::get('galasys/order', 'GalasysController@order');

Route::get('tests/send-email', 'TicketController@sendEmail');
Route::get('tests/get-pdf', 'TicketController@generatePdf');
Route::get('tests/galasys-order', 'TicketController@galasysOrder');
Route::get('tests/galasys-holidays', 'TicketController@galasysHolidays');
Route::get('tests/cimb-status', 'PaymentController@cimbStatus');