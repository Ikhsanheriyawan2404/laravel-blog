<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'WebsiteController@index')->name('index');
Route::get('category/{slug}', 'WebsiteController@category')->name('category');
Route::get('post/{slug}', 'WebsiteController@post')->name('post');
Route::get('page/{slug}', 'WebsiteController@page')->name('page');
Route::get('contact', 'WebsiteController@showContactForm')->name('contact.show');
Route::post('contact', 'WebsiteController@submitContactForm')->name('contact.submit');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('pages', 'PageController');
    Route::resource('galleries', 'GalleryController');
});
