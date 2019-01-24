<?php

namespace Pelomedusa\Cms\Interfaces;


interface Field{

    public function render(PageField $field = null);
    public function prepare($value);
}
?>