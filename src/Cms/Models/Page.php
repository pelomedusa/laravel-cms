<?php

namespace Pelomedusa\Cms\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'cms_page';


    public function field($key){
        return PageField::findComposite($this->id, $key);
    }

}
