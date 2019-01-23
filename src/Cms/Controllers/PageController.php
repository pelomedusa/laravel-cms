<?php

namespace Pelomedusa\Cms\Controllers;

use Pelomedusa\Cms\Controller;
use Illuminate\Http\Request;
use Pelomedusa\Cms\Models\Page;
use Pelomedusa\Cms\Models\PageField;
use Pelomedusa\Cms\Requests\PageRequest;

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

    public static function postEdit($id, PageRequest $request){

        $page = Page::whereId($id)->firstOrFail();
        $page->title = $request->title;
        $page->slug = $request->slug;

        if ($fields = FieldController::getFieldsObjects($page)){
            foreach ($fields as $fieldObject){
                $identifier = $fieldObject->identifier;
                if ( $request->{$identifier} ){
                    $field = PageField::findComposite($page->id, $identifier) ?: new PageField();
                    $field->page_id = $page->id;
                    $field->key = $identifier;
                    $field->value = $fieldObject->prepare($request->{$identifier});
                    $field->save();
                }
            }
        }

        $page->save();
        return redirect()->route("admin.pages.edit.post", $page->id);
    }



}
