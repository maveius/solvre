<?php

namespace Solvre\Views\Components;


use DateTime;
use liphte\tags\components\Renderable;
use liphte\tags\html\Tag;
use liphte\tags\html\Attribute as a;
use Solvre\Model\Doctrine\Entity\User;

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
     */
    public function __construct()
    {
        if( func_num_args() == 2 ) {
            $this->__construct2(func_get_arg(0), func_get_arg(1));
        } elseif ( func_num_args() == 4 ) {
            $this->__construct4(func_get_arg(0), func_get_arg(1), func_get_arg(2), func_get_arg(3));
        }
    }

    /**
     * @param string $class
     * @param User $user
     */
    public function __construct2($class, $user)
    {
        $this->class = $class;
        $this->icon = $user->getAvatar();
        $this->counter = null;
        $this->data = $user;
    }

    public function __construct4(
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

            /** @var User $user */
            $user = $this->data;

            /** @noinspection PhpMethodParametersCountMismatchInspection */
            return
                [
                    $this->getImage($iconPath, $t),
                    $t->span(a::c1ass('hidden-xs'),
                        $user->getFullName()
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

    /**
     * @param $counterValue
     * @param Tag $t
     * @return array
     */
    private function makeAList($counterValue, Tag $t)
    {

        if( $this->isUserMenu() ) {

            /** @var User $user */
            $user = $this->data;

            /** @var DateTime $joinDate */
            $joinDate = $user->getCreated();

            /** @noinspection PhpMethodParametersCountMismatchInspection */
            return
                [
                    $t->li( a::c1ass('user-header'),
                        $this->getImageBig($this->icon, $t),
                        $t->p(
                            $user->getPosition(),
                            $t->small( trans('menu.member.info', ['date' => $joinDate->format('d.m.Y').' r.' ] ) )
                        )
                    ),
                    $t->li( a::c1ass('user-footer'),
                        $t->div(a::c1ass("pull-left"),
                            $t->a(a::href("/profile"), a::c1ass("btn btn-default btn-flat"),
                                trans('menu.profile')
                            )
                        ),
                        $t->div( a::c1ass("pull-right"),
                          $t->a(a::href("/auth/logout"), a::c1ass("btn btn-default btn-flat"),
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

    /**
     * @param $iconPath
     * @param Tag $t
     * @return mixed
     */
    private function getImage($iconPath, $t)
    {
        if( $iconPath != null ) {
            return $t->img(a::c1ass('user-image'),
                a::src( $iconPath )
            );
        } else {
            return $t->i(a::c1ass('fa fa-user fa-1x'), '&nbsp;');
        }

    }

    /**
     * @param $iconPath
     * @param Tag $t
     * @return mixed
     */
    private function getImageBig($iconPath, $t)
    {
        if( $iconPath != null ) {
            return $t->img(a::c1ass('user-image'),
                a::src( $iconPath )
            );
        } else {
            return $t->i(a::c1ass('fa fa-user fa-5x white'), '&nbsp;');
        }

    }

}