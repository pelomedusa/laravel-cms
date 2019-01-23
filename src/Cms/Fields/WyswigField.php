<?php
/**
 * Created by PhpStorm.
 * User: Alfred Jossic
 * Date: 23/01/19
 * Time: 12:14
 */

namespace Pelomedusa\Cms\Fields;


use Pelomedusa\Cms\Interfaces\Field;

class WyswigField implements Field
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
     * TextField constructor.
     * @param string $identifier
     * @param string $label
     */
    public function __construct($identifier, $label)
    {

        $this->identifier = $identifier;
        $this->label = $label;
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