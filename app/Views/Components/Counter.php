<?php
/**
 * Created by PhpStorm.
 * User: maveius
 * Date: 31.10.15
 * Time: 22:19
 */

namespace Solvre\Views\Components;


use liphte\tags\components\Renderable;
use liphte\tags\html\Attribute as a;
use liphte\tags\html\Tag;

class Counter implements Renderable
{
    private $class;
    private $value;

    /**
     * Counter constructor.
     * @param string $class
     * @param $value
     */
    public function __construct($class, $value)
    {
        $this->class = $class;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function render()
    {
        $t = new Tag();
        $className = $this->getClass();
        $counterValue = $this->getValue();

        return $counterValue != null ? $t->span( a::c1ass("label label-$className"),
            "$counterValue"
        ) : '';
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param string $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}