<?php

namespace Pelomedusa\Cms\Controllers;

use App\Http\Controllers\Controller;
use Pelomedusa\Cms\Interfaces\Field;
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

        if ($fields = self::getFieldsObjects($page)){
            foreach ($fields as $fieldObject){
                $identifier = $fieldObject->getIdentifier();
                if ( $request->{$identifier} ){
                    $page->fields->{$identifier} = $fieldObject->prepare($request->{$identifier});
                }
            }
        }
        $page->save();


        return redirect()->route("admin.pages.edit.post", $page->id);
    }

    public function showEdit($id){
        $page = Page::find($id)->firstOrFail();
        return view('cms::admin.page.edit')->with("page", $page);
    }

    public static function postEdit($id, PageRequest $request){

        $page = Page::find($id)->firstOrFail();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $fields_to_save = new \stdClass();
        if ($fields_object = self::getFieldsObjects($page)){
            foreach ($fields_object as $fieldObject){
                $identifier = $fieldObject->getIdentifier();
                if ( $request->{$identifier} ){
                    $fields_to_save->{$identifier} = $fieldObject->prepare($request->{$identifier});
                }
            }
        }
        $page->fields = $fields_to_save;
        $page->save();
        return redirect()->route("admin.pages.edit.post", $page->id);
    }


    /**
     * @param Page|null $page
     * @return Field[]
     */
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
            dd($page->fields);
            $return .= $field->render(isset($page->fields->{$field->getIdentifier()}) ?
                $page->fields->{$field->getIdentifier()} : ""
                );
        }
        return $return;
    }


}
