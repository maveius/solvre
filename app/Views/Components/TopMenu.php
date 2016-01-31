<?php

namespace Solvre\Views\Components;


use liphte\tags\components\Renderable;
use liphte\tags\html\Attribute as a;
use liphte\tags\html\Tag;

class TopMenu implements Renderable
{

    private $menuElements;

    public function __construct( array $menuElements )
    {
        $this->menuElements = $menuElements;
    }

    public function render()
    {
        $t = new Tag();

        /** @noinspection PhpMethodParametersCountMismatchInspection */
        return $t->ul( a::c1ass('nav navbar-nav'),
            $this->menuElements
        );
    }
}