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
    public $identifier;
    /**
     * @var string
     */
    public $label;
    /**
     * @var string
     */
    public $placeholder;
    /**
     * @var string
     */
    public $default;

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


    public static function wyswig($identifier, $title, $placeholder="", $default=""){
        return [
            "identifier"    => $identifier,
            "title"    => $title,
            "placeholder"    => $placeholder,
            "default"    => $default,
        ];
    }

    public function render(PageField $field = null)
    {
        echo Form::label($this->identifier, $this->label);
        echo Form::text($this->identifier,$field ? $field->value : null, ["placeholder"  =>  $this->placeholder]);
        echo "<br>";
    }

    public function prepare($value)
    {
        return $value;
    }
}