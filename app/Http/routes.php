<?php


Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', 'HomeController@index');
    Route::get('/about', 'HomeController@about');
    Route::get('/contact', 'HomeController@contact');
    Route::get('/admin','AdminController@index');
    Route::resource('post','PostController');
    Route::resource('category','CategoryController');
    Route::resource('tag','TagController');

});
