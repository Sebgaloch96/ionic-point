<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/hub')->namespace('Hub')->middleware(['ajax'])->group(function () {
    Route::prefix('/jobs')->group(function () {
        Route::get('/listed', 'Api\JobController@listed');
        Route::get('/myJobs', 'Api\JobController@myJobs');
        Route::get('/myBookmarks', 'Api\JobController@myBookmarks');

        Route::post('{job}/bookmark', 'Api\JobController@bookmark');
        Route::post('/create', 'Api\JobController@create');
    });

    Route::prefix('/files')->group(function () {
        Route::get('{file}', 'Api\FileController@get');
        Route::post('/upload', 'Api\FileController@upload');
    });
});

