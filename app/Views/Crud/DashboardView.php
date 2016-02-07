<?php


namespace Solvre\Views\Crud;


use Solvre\Views\AuthView;
use Solvre\Views\Base\Layout;
use Illuminate\Http\Request;
use liphte\tags\html\Attribute as a;


class DashboardView extends AuthView
{

    public function render(Request $request) {

        return $this->layout()->render( $request );
    }


    protected function content()
    {
        $layout = new Layout();
        $t = $layout->getTag();

        return $t->div(a::c1ass('content-wrapper'), '&nbsp;');
    }

    protected function getActive()
    {
        return substr(substr(static::class, 18), 0, -4);

    }
}