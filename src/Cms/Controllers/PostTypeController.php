<?php

namespace Pelomedusa\Cms\Controllers;

use App\Http\Controllers\Controller;

use Pelomedusa\Cms\Models\PostType;

class PostTypeController
{
    /**
     * @var string
     */
    protected static $_name;

    /**
     * @var string
     */
    protected static $_plural;

    /**
     * @var string
     */
    protected static $_slug;

    /**
     * @var array
     */
    protected static $_fields;

    /**
     * @var string
     */
    protected static $_menu_name;

    /**
     * @var string
     */
    protected static $_icon;



    function showListing(){
        $posts = PostType::from("cms_".$this->getSlug())->get();

        return view('cms::admin.posttype.list')
            ->with("posts", $posts)
            ->with("title", $this->getName());
    }

    /**
     * @return string
     */
    public static function getName()
    {
        return static::$_name;
    }


    /**
     * @return string
     */
    public static function getPlural()
    {
        return static::$_plural;
    }


    /**
     * @return string
     */
    public static function getSlug()
    {
        return static::$_slug;
    }


    /**
     * @return string
     */
    public static function getMenuName()
    {
        return static::$_menu_name;
    }

    /**
     * @return string
     */
    public static function getIcon()
    {
        return static::$_icon;
    }


    /**
     * @return array
     */
    public static function getFields()
    {
        return static::$_fields;
    }




}
