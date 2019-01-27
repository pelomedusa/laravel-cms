<?php

namespace Pelomedusa\Cms\Controllers;

use App\Http\Controllers\Controller;
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

    public function showNew(){

        return view('cms::admin.page.new');
    }

    public static function postNew(PageRequest $request){

        $page = new Page();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->save();

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

        return redirect()->route("admin.pages.edit.post", $page->id);
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


    public static function getFieldsObjects(Page $page = null){
        $fields_any = config("cms.fields.pages.any") ?: [];
        $fields_slug = $page ? (config("cms.fields.pages.".$page->slug) ?: [] ) : [];

        $fields = array_merge($fields_any, $fields_slug);

        return $fields;
    }

    public static function renderFields(Page $page = null){
        $fields = self::getFieldsObjects($page);

        $return ="";
        if ($fields) foreach ($fields as $field){
            $return .= $field->render($page ? $page->field($field->identifier) : null);
        }
        return $return;
    }


}
