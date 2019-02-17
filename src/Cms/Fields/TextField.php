<?php
/**
 * Created by PhpStorm.
 * User: Alfred Jossic
 * Date: 23/01/19
 * Time: 12:14
 */

namespace Pelomedusa\Cms\Fields;


use Pelomedusa\Cms\Interfaces\Field;
use Form;
use Pelomedusa\Cms\Models\PageField;

class TextField implements Field
{
    /**
     * @var string
     */
    protected $identifier;
    /**
     * @var string
     */
    protected $label;
    /**
     * @var string
     */
    protected $placeholder;
    /**
     * @var string
     */
    protected $default;

    /**
     * TextField constructor.
     * @param string $identifier
     * @param string $label
     * @param string $placeholder
     * @param string $default
     */
    public function __construct($identifier, $label, $placeholder="", $default="")
    {
        $this->identifier = $identifier;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->default = $default;
    }


    public function render($field = null)
    {
        $html = Form::label($this->identifier, $this->label);
        $html .= Form::text($this->identifier,$field ? $field->value : null, ["placeholder"  =>  $this->placeholder]);
        return $html.= "<br>";
    }

    public function prepare($value)
    {
        return $value;
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    /**
     * @return string
     */
    public function getDefault()
    {
        return $this->default;
    }


}