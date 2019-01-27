<?php

namespace Pelomedusa\Cms\Controllers;

use App\Http\Controllers\Controller;

use Pelomedusa\Cms\Models\PostType;

class PostTypeController
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
     * @var string
     */
    protected $_icon;



    function showListing(){
        $posts = PostType::from("cms_".$this->getSlug())->get();

        return view('cms::admin.posttype.list')
            ->with("posts", $posts)
            ->with("title", $this->getName());
    }

    public function renderFields(Page $page = null){
        $fields = $this->getFields();

        $return ="";
        if ($fields) foreach ($fields as $field){
            $return .= $field->render($page ? $page->field($field->identifier) : null);
        }
        return $return;
    }


    public function showNew(){

        return view('cms::admin.posttype.new')
            ->with("fields", $this->renderFields());
    }

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
     * @return array
     */
    public function getFields()
    {
        return $this->_fields;
    }

    /**
     * @param array $fields
     */
    public function setFields($fields)
    {
        $this->_fields = $fields;
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
     * @return string
     */
    public function getIcon()
    {
        return $this->_icon;
    }

    /**
     * @param string $icon
     */
    public function setIcon($icon)
    {
        $this->_icon = $icon;
    }


}
