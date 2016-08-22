<?php


namespace Solvre\Views\Crud;


use Solvre\Model\Doctrine\Entity\Activity;
use Solvre\Utils\ActivityType;
use Solvre\Utils\Roles;
use liphte\tags\html\Tag;
use Solvre\Model\Doctrine\Entity\User;
use Solvre\Views\Base\AuthView;
use Solvre\Views\Base\Layout;
use Illuminate\Http\Request;
use liphte\tags\html\Attribute as a;
use Solvre\Views\Components\ActivitiesList;


class ProfileView extends AuthView
{

    /**
     * @var User user
     */
    private $user;

    /**
     * ProfileView constructor.
     * @param $params
     */
    public function __construct($params)
    {
        parent::__construct($params);
        $this->user = $this->getLoggedUser();
    }


    public function render(Request $request) {

        $this->layout()->addFooterJs("js/profile");
        return $this->layout()->render( $request );
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }


    protected function content()
    {
        $t = (new Layout())->getTag();

        /** @var User $user */
        $user = $this->user;
        $dataToggle = "data-toggle";
        $dataRel = "data-rel";
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        return $this->setContent(
            get_called_class(), '',
            $t->div(a::c1ass('content'),
                $t->div(a::c1ass('row'),
                    $t->div(a::c1ass('col-md-3'),
                        $t->div(a::c1ass('panel widget light-widget panel-bd-top'),
                            $t->div(a::c1ass('panel-heading no-title')),
                            $t->div(a::c1ass('panel-body'),
                                $t->div(a::c1ass('text-center vd_info-parent'),
                                    $t->img(
                                        a::alt('Your Avatar '),
                                        a::src(asset('img/profile-icon.png'))
                                    )
                                ),
                                $t->h2(a::c1ass('font-semibold mgbt-xs-5'),
                                    $user->getFullName()
                                ),
                                $t->h4(
                                    $user->getPosition()
                                ),
                                $t->p(a::c1ass('mgtp-20 font-x13'),
                                    trans('layout.details')
                                ),
                                $t->div(a::c1ass('font-x13'),
                                    $t->table(a::c1ass('table table-striped table-hover'),
                                        $t->tr(
                                            $t->td(
                                                'Status'
                                            ),
                                            $t->td(
                                                $t->span(a::c1ass('label label-'.$this->getStatusColor($user)),
                                                    $user->getStatus()
                                                )
                                            )
                                        ),
                                        $t->tr(
                                            $t->td(
                                                'E-mail'
                                            ),
                                            $t->td(
                                                $t->a(a::href('mailto:' . $user->getEmail()),
                                                    $user->getEmail()
                                                )
                                            )
                                        ),
                                        $t->tr(
                                            $t->td(
                                                trans( 'menu.member.info', ['date'=>''] )
                                            ),
                                            $t->td(
                                                $user->getCreated()->format('d.m.Y').' r.'
                                            )
                                        )
                                    )
                                )
                            )

                        )
                    ),
                    $t->div(a::c1ass('col-md-9'),
                        $t->div(a::c1ass('tabs widget'),
                            $t->ul(a::c1ass('nav nav-tabs widget'),
                                $t->li(a::c1ass('active'),
                                    $t->a(
                                        a::$dataToggle('tab'),
                                        a::href('#activity-tab'),
                                        trans('menu.activity')
                                    )
                                ),
                                $t->li(
                                    $t->a(
                                        a::$dataToggle('tab'),
                                        a::href('#groups-tab'),
                                        trans('menu.groups')
                                    )
                                ),
                                $t->li(
                                    $t->a(
                                        a::$dataToggle('tab'),
                                        a::href('#projects-tab'),
                                        trans('menu.projects')
                                    )
                                )
                            ),
                            $this->renderEditButton($t, $user),
                            $t->div(a::c1ass('tab-content'),
                                $t->div(
                                    a::id('activity-tab'),
                                    a::c1ass('tab-pane active'),
                                    $t->div(a::c1ass('col-md-12 pd-5'),
                                        $t->h3(a::c1ass('mgbt-xs-15 font-semibold'),
                                            $t->i(a::c1ass('fa fa-globe mgr-10 profile-icon')),
                                            trans('menu.activity')
                                        ),
                                        $t->div(
                                            $t->div(a::c1ass('content-list'),
                                                $t->div(
                                                    a::$dataRel('scroll'),
                                                    new ActivitiesList($user->getActivities())
                                                )
                                            )
//
                                        )
                                    )
                                ),
                                $t->div(
                                    a::id('groups-tab'),
                                    a::c1ass('tab-pane'),
                                    $t->div(a::c1ass('col-md-12 pd-5'),
                                        $t->h3(a::c1ass('mgbt-xs-15 font-semibold'),
                                            $t->i(a::c1ass('fa fa-users mgr-10 profile-icon')),
                                            trans('menu.groups')
                                        )
                                    )
                                ),
                                $t->div(
                                    a::id('projects-tab'),
                                    a::c1ass('tab-pane'),
                                    $t->div(a::c1ass('col-md-12 pd-5'),
                                        $t->h3(a::c1ass('mgbt-xs-15 font-semibold'),
                                            $t->i(a::c1ass('fa fa-folder mgr-10 profile-icon')),
                                            trans('menu.projects')
                                        )
                                    )
                                )
                            )
                        )
                    )

                )
            )
        );
    }

    protected function getActive()
    {
        return substr(substr(static::class, 18), 0, -4);

    }

    /**
     * @param Tag $t
     * @param User $user
     * @return mixed
     */
    protected function renderEditButton($t, $user)
    {
        if($this->getLoggedUser() === $user || $this->getLoggedUser()->hasRole(Roles::ADMIN)) {

            /** @noinspection PhpMethodParametersCountMismatchInspection */
            return $t->div(a::c1ass('vd_info'), a::style('top: 3px; right:3px;'),
                $t->a(a::c1ass('btn btn-sm btn-default'),
                    $t->i(a::c1ass('fa fa-pencil append-icon')),
                    trans('menu.edit')
                )
            );

        } else {

            return '';
        }

    }

    /**
     * @param User $user
     * @return mixed
     */
    private function getStatusColor($user)
    {
        switch ( $user->getStatus() ) {
            case 'ACTIVE':
                return 'success';
            case 'CREATED':
                return 'primary';
            case 'DELETED':
            case 'LOCKED':
                return 'danger';
            default:
                return 'default';
        }
    }

    

}