<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' =>  config("cms.prefix")], function(){
    Route::get('/', function (){
        return view('cms::admin.layout');
    })->middleware("auth")->name('admin.dashboard');

    Route::get('/pages', 'Pelomedusa\Cms\Controllers\PageController@showListing')->name('admin.pages');
    Route::get('/pages/{id}', 'Pelomedusa\Cms\Controllers\PageController@showEdit')->name('admin.pages.edit');
    Route::post('/pages/{id}', 'Pelomedusa\Cms\Controllers\PageController@postEdit')->name('admin.pages.edit.post');

});

?>