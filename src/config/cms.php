<?php

use Pelomedusa\Cms\Fields\TextField;

return [
    "site"  =>  [
        "nicename"  =>  "Laravel Tester"
    ],

    "prefix"   => "admin",

    "fields"    => [
        "pages" => [
            "any"   => [
                "body"  => new TextField("body", "Content")
            ],
        ]
    ],

    "post_types"    =>  [
        new \Pelomedusa\Cms\Controllers\PostController()
    ]
];