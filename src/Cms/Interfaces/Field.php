<?php

namespace Pelomedusa\Cms\Interfaces;


use Pelomedusa\Cms\Models\PageField;

interface Field{

    public function render(PageField $field = null);
    public function prepare($value);
}
?>