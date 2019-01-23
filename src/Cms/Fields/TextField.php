<?php
/**
 * Created by PhpStorm.
 * User: Alfred Jossic
 * Date: 23/01/19
 * Time: 12:14
 */

namespace Pelomedusa\Cms\Fields;


use Pelomedusa\Cms\Interfaces\Field;

class TextField implements Field
{
    /**
     * @var string
     */
    private $identifier;
    /**
     * @var string
     */
    private $label;
    /**
     * @var string
     */
    private $placeholder;
    /**
     * @var string
     */
    private $default;

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

    public function render()
    {
        // TODO: Implement render() method.
    }

    public function save()
    {
        // TODO: Implement save() method.
    }
}