<?php

namespace Solvre\Views;

use Solvre\Utils\AccessHelper;
use Solvre\Views\Components\MenuElement;
use Solvre\Views\Components\TopMenu;
use liphte\tags\html\Tag;
use liphte\tags\html\Attribute as a;
use Solvre\Views\Base\Layout;
use Illuminate\Http\Request;

abstract class AuthView
{

    const DATA = 0;
    const SIZE = 1;
    const ICON = 2;
    const COLOR = 3;

    private $layout;

    private $topMenu;

    private $data;

    /**
     * AuthView constructor.
     */
    public function __construct()
    {
        if( func_num_args() > 0 ) {
            $this->data = func_get_arg(0);
        }

        $this->topMenu = new TopMenu(
            $this->data
        );
    }

    public abstract function render(Request $request);


    protected function layout()
    {
        $layoutObject = $this->layout = new Layout();

        $layoutObject->addBodyAttribute( a::c1ass('skin-blue sidebar-mini wysihtml5-supported') );

        $layoutObject->setContent(
            $this->wrapper( $layoutObject )
        );

        $layoutObject->addFooterJs("js/lib/admin/app.min");


        return $layoutObject;
    }

    protected abstract function content();

    /**
     * @param Layout $someLayout
     * @return string
     */
    protected function wrapper(Layout $someLayout)
    {
        $t = $someLayout->getTag();

        /** @noinspection PhpMethodParametersCountMismatchInspection */
        /** @noinspection PhpUndefinedMethodInspection */
        return $t->div( a::id('wrapper'),
            $t->header( a::c1ass('main-header'),
                $t->a( a::c1ass('logo'), a::href('/dashboard'),
                    $t->span( a::c1ass('logo-mini'),
                        $t->img(a::src(asset('img/logo.png')), a::style('width: 79%; margin: 0 0 0 7%;')),
                        $t->b('Solvre')
                    ),
                    $t->span( a::c1ass('logo-lg'),
                        $t->img( a::src( asset('img/logo-fav-lg.png') ) ),
                        $t->b('Solvre')
                    )
                ),
                $this->navbarTop($t)
            ),
            $this->aside($t),
            $this->content()
        );
    }

    protected function navbarTop(Tag $t)
    {
        $dataToggle = "data-toggle";

        /** @noinspection PhpMethodParametersCountMismatchInspection */
        /** @noinspection PhpUndefinedMethodInspection */
        return $t->nav(
            a::c1ass('navbar navbar-static-top'),
            a::role('navigation'),
            $t->a(
                a::href('#'),
                a::c1ass('sidebar-toggle'),
                a::$dataToggle('offcanvas'),
                a::role('button'),
                $t->span( a::c1ass('sr-only'),
                    trans('menu.toggle.navigation')
                )
            ),
            $t->div( a::c1ass('navbar-custom-menu'),
                $this->getTopMenu()
            )
        );
    }


    /**
     * @param Tag $t
     * @return mixed
     */
    private function aside($t) {

        /** @noinspection PhpUndefinedMethodInspection */
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        return $t->aside( a::c1ass('main-sidebar'),
            $t->section(
                a::c1ass('sidebar'),
                a::style('height: auto;'),
                $t->div( a::c1ass('user-panel'),
                    $t->div( a::c1ass('pull-left image'),
                        $t->img(

                            a::src( $this->getData()[1]->getIcon() ),
                            a::c1ass('img-circle'),
                            a::alt('User Image')
                        )
                    ),
                    $t->div( a::c1ass('pull-left info'),
                        $t->p( $this->getLoggedUser() ),
                        $t->a( a::href("#"),
                            $t->i( a::c1ass('fa fa-circle text-success') ),
                            'Online'
                        )
                    )
                ),
                $t->form(
                    a::c1ass('sidebar-form'),
                    a::method('get'),
                    a::action('#'),
                    $t->div(a::c1ass('input-group'),
                        $t->input(
                            a::c1ass('form-control'),
                            a::type('text'),
                            a::placeholder('Search...'),
                            a::name('q')
                        ),
                        $t->span(a::c1ass('input-group-btn'),
                            $t->button(
                                a::id('search-btn'),
                                a::c1ass('btn btn-flat'),
                                a::name('search'),
                                a::type('submit'),
                                $t->i(a::c1ass('fa fa-search'))
                            )
                        )
                    )
                ),
                $t->ul( a::c1ass('sidebar-menu'),
                    $t->li( a::c1ass('header'), 'MAIN NAVIGATION' ),
                    $this->renderMenu($t)
                )
            )
        );
    }

    protected function renderMenu(Tag $t) {

        $menu = array(
            'Dashboard' => 'dashboard',
            'Project' => 'folder',
            'Issue' => 'tasks',
            'Agile' => 'clock-o',
            'Report' => 'line-chart',
            'Code Review' => 'code',
            'Commit' => 'code-fork',
            'Plan' => 'sitemap',
            'Settings' => 'gear'
        );

        $list = array();

        foreach($menu as $item => $icon) {
            array_push($list,
                $this->createMenuItem($item, $icon, $t)
            );
        }

        return implode('', $list);

    }

    /**
     * @return TopMenu
     */
    public function getTopMenu()
    {
        return $this->topMenu;
    }

    /**
     * @param TopMenu $topMenu
     */
    public function setTopMenu($topMenu)
    {
        $this->topMenu = $topMenu;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    public function getLoggedUser() {

        /** @var MenuElement $menuElementData */
        foreach ( $this->getData() as $menuElementData ) {
            if ( $menuElementData->getClass() == 'user user' ) {
                return $menuElementData->getData();
            }
        }

        return array();
    }

    protected abstract function getActive();

    private function createMenuItem($item, $icon, Tag $t)
    {
        if( AccessHelper::exists($item) && AccessHelper::hasPermission($item, $this->getLoggedUser()) ) {
            /** @noinspection PhpMethodParametersCountMismatchInspection */
            return $t->li( ($item === $this->getActive() ? a::c1ass('active') : ''),
                [
                    $t->a( a::href('/' . strtolower($item) ),
                        $t->i( a::c1ass('fa fa-' . strtolower($icon) ) ),
                        $t->span(trans( 'menu.' . strtolower($item) ) )
                    )
                ]
            );
        } else {
            return '';
        }
    }
}