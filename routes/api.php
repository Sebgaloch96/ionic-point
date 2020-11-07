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

Route::prefix('/hub')->name('.hub')->namespace('Hub')->middleware(['ajax'])->group(function () {
    Route::prefix('/jobs')->name('.jobs')->group(function () {
        Route::get('/listed', 'Api\JobController@listed')->name('.listed');
        Route::get('/myJobs', 'Api\JobController@myJobs')->name('.myJobs');
    });
});

