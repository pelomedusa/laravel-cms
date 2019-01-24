<?php

namespace Pelomedusa\Cms\Controllers;

use App\Http\Controllers\Controller;

use Pelomedusa\Cms\Interfaces\PostType;

class PostTypeController extends Controller
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
     * @return string
     */
    public function getName()
    {
        return static::$_name;
    }


    /**
     * @return string
     */
    public function getPlural()
    {
        return static::$_plural;
    }


    /**
     * @return string
     */
    public function getSlug()
    {
        return static::$_slug;
    }


    /**
     * @return string
     */
    public function getMenuName()
    {
        return static::$_menu_name;
    }


    /**
     * @return array
     */
    public function getFields()
    {
        return static::$_fields;
    }




}
