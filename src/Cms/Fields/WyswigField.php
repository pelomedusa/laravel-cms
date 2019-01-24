<?php
/**
 * Created by PhpStorm.
 * User: Alfred Jossic
 * Date: 23/01/19
 * Time: 12:14
 */

namespace Pelomedusa\Cms\Fields;


use Pelomedusa\Cms\Interfaces\Field;
use Pelomedusa\Cms\Models\PageField;

class WyswigField implements Field
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
     * TextField constructor.
     * @param string $identifier
     * @param string $label
     */
    public function __construct($identifier, $label)
    {

        $this->identifier = $identifier;
        $this->label = $label;
    }

    public function render(PageField $field = null)
    {
        // TODO: Implement render() method.
    }

    public function prepare($value)
    {
       return $value;
    }
}