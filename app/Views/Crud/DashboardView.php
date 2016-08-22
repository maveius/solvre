<?php


namespace Solvre\Views\Crud;


use Solvre\Views\Base\AuthView;
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
        $t = (new Layout())->getTag();

        return $this->setContent(
            get_called_class(),
            $t->small('Control panel')
        );
    }

    protected function getActive()
    {
        return substr(substr(static::class, 18), 0, -4);

    }
}