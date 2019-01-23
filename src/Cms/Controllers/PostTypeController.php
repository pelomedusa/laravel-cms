<?php

namespace Pelomedusa\Cms\Controllers;

use App\Http\Controllers\Controller;

use Pelomedusa\Cms\Interfaces\PostType;

class PostTypeController extends Controller
{
    /**
     * @var string
     */
    protected $_name;

    /**
     * @var string
     */
    protected $_plural;

    /**
     * @var string
     */
    protected $_slug;

    /**
     * @var array
     */
    protected $_fields;

    /**
     * @var string
     */
    protected $_menu_name;



    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return string
     */
    public function getPlural()
    {
        return $this->_plural;
    }

    /**
     * @param string $plural
     */
    public function setPlural($plural)
    {
        $this->_plural = $plural;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->_slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->_slug = $slug;
    }

    /**
     * @return string
     */
    public function getMenuName()
    {
        return $this->_menu_name;
    }

    /**
     * @param string $menu_name
     */
    public function setMenuName($menu_name)
    {
        $this->_menu_name = $menu_name;
    }



    /**
     * @return array
     */
    public function getFields()
    {
        return $this->_fields;
    }

    /**
     * @param array $fields
     */
    public function setFields(array $fields)
    {
        $this->_fields = $fields;
    }



}
