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

class Box implements Field
{
    /**
     * @var string
     */
    protected $fields;

    /**
     * TextField constructor.
     * @param array $fields
     */
    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }


    public function render($field = null)
    {
        $html = "<div class='nice'>";
        if ($this->fields) foreach ($this->fields as $field){
            $html.= $field->render();
        }
        $html .= "</div>";
        return$html;
    }

    public function prepare($value)
    {
        return $value;
    }
}