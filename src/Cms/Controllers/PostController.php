<?php

namespace Pelomedusa\Cms\Controllers;

use App\Http\Controllers\Controller;

use Pelomedusa\Cms\Interfaces\PostType;

class PostController extends PostTypeController
{

    protected static $_name ="Post";
    protected static $_plural ="Posts";
    protected static $_slug ="post";
    protected static $_menu_name ="My Posts";

}
