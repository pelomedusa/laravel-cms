<?php

namespace Pelomedusa\Cms\Interfaces;


use Pelomedusa\Cms\Models\PageField;

interface Field{

    public function render($field);
    public function prepare($value);
}
?>