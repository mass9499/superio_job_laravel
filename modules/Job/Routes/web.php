<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>config('job.job_route_prefix')],function(){
    Route::get('/','JobController@index')->name('job.search');
    Route::get('/{slug}','JobController@detail');

    Route::post('/apply-job', 'JobController@applyJob')->name('job.apply-job');
});
