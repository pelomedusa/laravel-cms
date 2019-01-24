<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' =>  config("cms.prefix")], function(){
    Route::get('/', function (){
        return view('cms::admin.layout');
    })->middleware("auth")->name('admin.dashboard');

    Route::get('/pages', 'Pelomedusa\Cms\Controllers\PageController@showListing')->name('admin.pages');

    Route::get('/pages/new', 'Pelomedusa\Cms\Controllers\PageController@showNew')->name('admin.pages.new');
    Route::post('/pages/new', 'Pelomedusa\Cms\Controllers\PageController@postNew')->name('admin.pages.new.post');

    Route::get('/pages/{id}', 'Pelomedusa\Cms\Controllers\PageController@showEdit')->name('admin.pages.edit');
    Route::post('/pages/{id}', 'Pelomedusa\Cms\Controllers\PageController@postEdit')->name('admin.pages.edit.post');

    if ($post_types_classes = config("cms.post_types")){
        foreach ($post_types_classes as $post_types_class){
            $slug = $post_types_class::getSlug();

            Route::get("/$slug", 'Pelomedusa\Cms\Controllers\PageController@showListing')->name("admin.$slug");

            Route::get("/$slug/new", 'Pelomedusa\Cms\Controllers\PageController@showNew')->name("admin.$slug.new");
            Route::post("/$slug/new", 'Pelomedusa\Cms\Controllers\PageController@postNew')->name("admin.$slug.new.post");

            Route::get("/$slug/{id}", 'Pelomedusa\Cms\Controllers\PageController@showEdit')->name("admin.$slug.edit");
            Route::post("/$slug/{id}", 'Pelomedusa\Cms\Controllers\PageController@postEdit')->name("admin.$slug.edit.post");

        }
    }

});

?>