<?php

namespace Pelomedusa\Cms\Controllers;

use App\Http\Controllers\Controller;

use Pelomedusa\Cms\Fields\Box;
use Pelomedusa\Cms\Fields\TextAreaField;
use Pelomedusa\Cms\Fields\TextField;
use Pelomedusa\Cms\Interfaces\PostType;

class PostController extends PostTypeController
{


    public function __construct()
    {


        $this->setName("Post");
        $this->setPlural("Posts");
        $this->setSlug("post");
        $this->setMenuName("My Posts");
        $this->setIcon("fa-adjust");
        $this->setFields([
            new TextField("subtitle", "Subtitle"),
            new Box([
                new TextAreaField("text", "Text")
            ])
        ]);
    }


}
