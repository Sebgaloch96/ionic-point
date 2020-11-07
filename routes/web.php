<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'WebsiteController@home')->name('home');
Route::get('/membership', 'WebsiteController@membership')->name('membership');
Route::get('/about-us', 'WebsiteController@aboutUs')->name('aboutUs');
Route::get('/contact-us', 'WebsiteController@contactUs')->name('contactUs');

Route::prefix('/hub')->name('hub')->namespace('Hub')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('.dashboard');

    Route::prefix('/jobs')->name('.jobs')->group(function () {
        Route::get('/', 'JobController@index');
        Route::get('/create', 'JobController@create')->name('.create');
        Route::get('{job}/edit', 'JobController@edit')->name('.edit');
    });

    Route::get('/calendar', 'CalendarController@index')->name('.calendar');
});

