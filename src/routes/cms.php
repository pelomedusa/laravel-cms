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

    if ($post_types = config("cms.post_types")){
        foreach ($post_types as $post_type){
            $slug = $post_type->getSlug();

            Route::get("/$slug", get_class($post_type)."@showListing")->name("admin.$slug");

            Route::get("/$slug/new", get_class($post_type)."@showNew")->name("admin.$slug.new");
            Route::post("/$slug/new", get_class($post_type)."@postNew")->name("admin.$slug.new.post");

            Route::get("/$slug/{id}", get_class($post_type)."@showEdit")->name("admin.$slug.edit");
            Route::post("/$slug/{id}", get_class($post_type)."@postEdit")->name("admin.$slug.edit.post");

        }
    }

});

?>