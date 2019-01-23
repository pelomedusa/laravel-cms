<?php

namespace Pelomedusa\Cms\Models;

use Illuminate\Database\Eloquent\Model;

class PageField extends Model
{
    protected $table = 'cms_page_values';

    public static function findComposite($page_id, $key){
        return self::where("page_id", $page_id)->where("key", $key)->first();
    }
}
