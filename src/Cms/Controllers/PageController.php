<?php

namespace Pelomedusa\Cms\Controllers;

use Pelomedusa\Cms\Controller;
use Illuminate\Http\Request;
use Pelomedusa\Cms\Models\Page;

class PageController extends Controller
{
    public function store(PageRequest $request)
    {
        $fields = $request->validated();

        $page = new Page();
        $page->title = $fields->title;
        $page->slug = $fields->slug;
        $page->save();
    }

    public static function showListing(){
        $pages = Page::all();

        return view('cms::admin.page.list')->with("pages", $pages);
    }

    public function showEdit($id){
        $page = Page::whereId($id)->firstOrFail();

        return view('cms::admin.page.edit')->with("page", $page);
    }

}
