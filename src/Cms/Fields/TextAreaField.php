<?php
/**
 * Created by PhpStorm.
 * User: Alfred Jossic
 * Date: 23/01/19
 * Time: 12:14
 */

namespace Pelomedusa\Cms\Fields;

use Form;
use Pelomedusa\Cms\Interfaces\Field;
use Pelomedusa\Cms\Models\PageField;

class TextAreaField implements Field
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
     * TextField constructor.
     * @param string $identifier
     * @param string $label
     */
    public function __construct($identifier, $label)
    {

        $this->identifier = $identifier;
        $this->label = $label;
    }

    public function render($field = null)
    {
        $html = Form::label($this->identifier, $this->label);
        $html .= Form::textarea($this->identifier,$field ? $field->value : null);
        return $html.= "<br>";
    }

    public function prepare($value)
    {
       return $value;
    }
}