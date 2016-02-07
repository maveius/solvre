<?php

namespace Solvre\Views\Components;


use liphte\tags\components\Renderable;
use liphte\tags\html\Tag;
use liphte\tags\html\Attribute as a;

class MenuElement implements Renderable
{
// Notification extents MenuElement extends Entity:
    const HREF = 0;
    const DESCRIPTION = 1;
    const ICON_PATH = 2;
    const COLOR = 3;

// User Entity:
    const FULL_NAME = self::HREF;
    const POSITION = self::DESCRIPTION;
    const JOIN = self::ICON_PATH;
    const USER_USER = 'user user';

    private $class;
    private $icon;
    private $counter;
    private $data;

    /**
     * MenuElement constructor.
     * @param $class
     * @param $icon
     * @param Counter|null $counter
     * @param $data
     */
    public function __construct(
        $class,
        $icon,
        $counter,
        $data)
    {
        $this->class = $class;
        $this->icon = $icon;
        $this->counter = $counter;
        $this->data = $data;
    }

    public function render()
    {
        $t = new Tag();
        $dataToggle = "data-toggle";


        $className = $this->getClass();
        $iconPath = $this->getIcon();
        $counterValue = $this->getCounter() != null ? $this->getCounter()->getValue() : null;

        /** @noinspection PhpMethodParametersCountMismatchInspection */
        return $t->li( a::c1ass("dropdown $className-menu"),
            $t->a(
                a::href('#'),
                a::c1ass('dropdown-toggle'),
                a::$dataToggle('dropdown'),
                $this->prepareAriaFor($className),
                $this->prepareContentFor($className, $iconPath),
                $this->getCounter()
            ),
            $t->ul( a::c1ass('dropdown-menu'),
                $this->makeAList($counterValue, $t)
            )
        );
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     */
    public function setIcon( $icon )
    {
        $this->icon = $icon;
    }

    /**
     * @return Counter
     */
    public function getCounter()
    {

        return $this->counter;
    }

    /**
     * @param Counter $counter
     */
    public function setCounter($counter)
    {
        $this->counter = $counter;
    }

    private function prepareAriaFor($className)
    {
        if( $className !== static::USER_USER) {

            return a::ariaExpanded('false');
        }
    }

    private function prepareContentFor($clazz, $iconPath)
    {
        $t = new Tag();
        if( $clazz !== static::USER_USER) {

            return $t->i( a::c1ass("fa $iconPath") );
        } else {

            /** @noinspection PhpMethodParametersCountMismatchInspection */
            return
                [
                    $t->img(a::c1ass('user-image'),
                        a::alt(trans('menu.user.image')),
                        a::src( $iconPath )
                    ),
                    $t->span(a::c1ass('hidden-xs'),
                        $this->data[ static::FULL_NAME ]
                    )
                ];
        }
    }

    private function renderList($inputData, Tag $t) {

        $list = array();

        /** @var Renderable $item */
        foreach ( $inputData as $item ) {

            array_push($list, $item->render());
        }

        return $list;
    }

    private function makeAList($counterValue, Tag $t)
    {

        if( $this->isUserMenu() ) {

            /** @noinspection PhpMethodParametersCountMismatchInspection */

            return
                [
                    $t->li( a::c1ass('user-header'),
                        $t->img(
                            a::c1ass('img-circle'),
                            a::src($this->icon),
                            a::alt(trans('menu.user.image'))
                        ),
                        $t->p(
                            $this->data[static::POSITION],
                            $t->small( trans('menu.member.info', ['date' => $this->data[static::JOIN] ] ) )
                        )
                    ),
                    $t->li( a::c1ass('user-footer'),
                        $t->div(a::c1ass("pull-left"),
                            $t->a(a::href("/profile"), a::c1ass("btn btn-default btn-flat"),
                                trans('menu.profile')
                            )
                        ),
                        $t->div( a::c1ass("pull-right"),
                          $t->a(a::href("/"), a::c1ass("btn btn-default btn-flat"),
                              trans('menu.sign.out')
                          )
                        )
                    )
                ];
        }

        return
            [
                $t->li( a::c1ass('header'),
                    trans( 'menu.unread.notification.info', ['counter' => "$counterValue"] )
                ),
                $t->li(
                    $t->ul( a::c1ass('menu'),
                        $this->renderList( $this->data, $t )
                    )
                ),
                $t->li( a::c1ass('footer'),
                    $t->a( a::href('#'),
                        trans('menu.view.all')
                    )
                )
            ];

    }

    private function isUserMenu()
    {
        return $this->class === static::USER_USER;
    }

    /**
     * @return mixed
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

}