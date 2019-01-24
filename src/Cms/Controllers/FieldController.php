<?php

namespace Pelomedusa\Cms\Controllers;

use App\Http\Controllers\Controller;
use Pelomedusa\Cms\Models\Page;

class FieldController extends Controller
{
    public static function getFieldsObjects(Page $page = null){
        $fields_any = config("cms.fields.pages.any") ?: [];
        $fields_slug = $page ? (config("cms.fields.pages.".$page->slug) ?: [] ) : [];

        $fields = array_merge($fields_any, $fields_slug);

        return $fields;
    }

    public static function renderFields(Page $page = null){
        $fields = self::getFieldsObjects($page);
        foreach ($fields as $field){
            $field->render($page ? $page->field($field->identifier) : null);
        }
    }
}
