<?php
use Illuminate\Support\Facades\Route;

Route::get('/','CompanyController@index')->name('company.admin.index');
Route::get('/create','CompanyController@create')->name('company.admin.create');
Route::get('/edit/{id}', 'CompanyController@edit')->name('company.admin.edit');
Route::post('/bulkEdit','CompanyController@bulkEdit')->name('company.admin.bulkEdit');
Route::post('/store/{id}','CompanyController@store')->name('company.admin.store');

Route::group(['prefix'=>'attribute'],function (){
    Route::get('/','AttributeController@index')->name('company.admin.attribute.index');
    Route::get('edit/{id}','AttributeController@edit')->name('company.admin.attribute.edit');
    Route::post('store/{id}','AttributeController@store')->name('company.admin.attribute.store');
    Route::post('/editAttrBulk','AttributeController@editAttrBulk')->name('company.admin.attribute.editAttrBulk');


    Route::get('terms/{id}','AttributeController@terms')->name('company.admin.attribute.term.index');
    Route::get('term_edit/{id}','AttributeController@term_edit')->name('company.admin.attribute.term.edit');
    Route::post('term_store','AttributeController@term_store')->name('company.admin.attribute.term.store');
    Route::post('/editTermBulk','AttributeController@editTermBulk')->name('company.admin.attribute.term.editTermBulk');

    Route::get('getForSelect2','AttributeController@getForSelect2')->name('company.admin.attribute.term.getForSelect2');
});

Route::get('/getForSelect2', 'CompanyController@getForSelect2')->name('company.admin.getForSelect2');

Route::get('/my-contact','CompanyController@myContact')->name('company.admin.myContact');
