<?php

namespace Pelomedusa\Cms\Interfaces;


interface Field{

    public function render($field);
    public function prepare($value);
}
?>