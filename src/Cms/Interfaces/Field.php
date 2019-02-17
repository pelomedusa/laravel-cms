<?php

namespace Pelomedusa\Cms\Interfaces;


interface Field{

    public function render($value);
    public function prepare($value);
}
?>