<?php

namespace Pelomedusa\Cms\Controllers;

use App\Http\Controllers\Controller;
use Pelomedusa\Cms\Models\Page;

class FieldController extends Controller
{
    public static function getFieldsObjects(Page $page){
        $fields_any = config("cms.fields.pages.any") ?: [];
        $fields_slug = config("cms.fields.pages.".$page->slug) ?: [];

        $fields = array_merge($fields_any, $fields_slug);

        return $fields;
    }

    public static function renderFields(Page $page){
        $fields = self::getFieldsObjects($page);
        foreach ($fields as $field){
            $field->render($page->field($field->identifier));
        }
    }
}
