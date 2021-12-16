<?php

use Illuminate\Support\Facades\Route;

Route::get('/','JobController@index')->name('job.admin.index');
Route::get('/create','JobController@create')->name('job.admin.create');
Route::get('/edit/{id}', 'JobController@edit')->name('job.admin.edit');
Route::post('/bulkEdit','JobController@bulkEdit')->name('job.admin.bulkEdit');
Route::post('/store/{id}','JobController@store')->name('job.admin.store');
Route::get('/getForSelect2','JobController@getForSelect2')->name('job.admin.getForSelect2');

//Job Types
Route::get('/job-type','JobTypeController@index')->name('job.admin.type.index');
Route::get('/job-type/edit/{id}','JobTypeController@edit')->name('job.admin.type.edit');
Route::post('/job-type/store/{id}','JobTypeController@store')->name('job.admin.type.store');
Route::post('/job-type/editBulk','JobTypeController@editBulk')->name('job.admin.type.bulkEdit');

Route::get('/all-applicants','JobController@allApplicants')->name('job.admin.allApplicants');
Route::get('/all-applicants/{status}/{id}','JobController@applicantsChangeStatus')->name('job.admin.applicants.changeStatus');
Route::post('/all-applicants/bulkEdit','JobController@applicantsBulkEdit')->name('job.admin.applicants.bulkEdit');
Route::get('/all-applicants/export','JobController@applicantsExport')->name('job.admin.applicants.export');
