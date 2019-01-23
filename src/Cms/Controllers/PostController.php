<?php

namespace Pelomedusa\Cms\Controllers;

use App\Http\Controllers\Controller;

use Pelomedusa\Cms\Interfaces\PostType;

class PostController extends PostTypeController
{


    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->setName("Post");
        $this->setPlural("Posts");
        $this->setSlug("post");
        $this->setMenuName("My Posts");
    }
}
