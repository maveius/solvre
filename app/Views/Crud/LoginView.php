<?php


namespace Solvre\Views\Crud;


use Session;
use Solvre\Views\Base\Layout;
use Illuminate\Http\Request;
use liphte\tags\html\Tag;
use liphte\tags\html\Attribute as a;

class LoginView
{

    public function render(Request $request) {

        return $this->layout()->render( $request );
    }

    private function layout()
    {

        $layout = new Layout();
        $t = $layout->getTag();

        $footerJs = array(
            'lib/plugins/iCheck/icheck.min'
        );

        $layout->addAllFooterJs( $footerJs );
        $layout->addBodyAttribute( a::c1ass('login-page') );
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        $layout->setContent(

            $t->div( a::c1ass('login-box'),
                [
                    $t->div( a::c1ass('login-logo'),
                        $t->img(
                            a::id('profile-img'),
                            a::c1ass('login-box-logo'),
                            a::src( asset('img/solvre128.png') )
                        )
                    ),
                    $this->renderForm($t)
                ]
            )
        );

        return $layout;
    }

    private function renderForm(Tag $t) {

        /** @noinspection PhpMethodParametersCountMismatchInspection */
        /** @noinspection PhpUndefinedFunctionInspection */
        /** @noinspection PhpUndefinedClassConstantInspection */
        return $t->div(a::c1ass('login-box-body'),
            [
                $t->p( a::c1ass('login-box-msg '. $this->getClasses()), $this->getInfoMessage($t) ),
                $t->form( a::c1ass('form-signin'), a::action('/auth/login'), a::method('POST'),
                    [
                        $t->div( a::c1ass('form-group has-feedback hidden register'),
                            [
                                $t->input(
                                    a::type('text'),
                                    a::c1ass('form-control'),
                                    a::placeholder( trans('placeholder.fullName') ),
                                    a::id('inputFullName'),
                                    a::name('fullName'),
                                    a::autofocus('autofocus')
                                ),
                                $t->span( a::c1ass ('glyphicon glyphicon-user form-control-feedback') )
                            ]
                        ),
                        $t->div( a::c1ass('form-group has-feedback'),
                            [
                                $t->input(
                                    a::type('email'),
                                    a::c1ass('form-control'),
                                    a::placeholder( trans('placeholder.email') ),
                                    a::id('inputEmail'),
                                    a::name('email'),
                                    a::required('required'),
                                    a::autofocus('autofocus')
                                ),
                                $t->span( a::c1ass ('glyphicon glyphicon-envelope form-control-feedback') )
                            ]
                        ),
                        $t->div( a::c1ass('form-group has-feedback'),
                            [
                                $t->input(
                                    a::type('password'),
                                    a::id('inputPassword'),
                                    a::name('password'),
                                    a::c1ass('form-control'),
                                    a::placeholder( trans('placeholder.password') ),
                                    a::required('required')
                                ),
                                $t->span( a::c1ass ('glyphicon glyphicon-lock form-control-feedback') )
                            ]
                        ),
                        $t->div( a::c1ass('form-group has-feedback hidden register'),
                            [
                                $t->input(
                                    a::type('password'),
                                    a::id('inputRetypePassword'),
                                    a::name('retypedPassword'),
                                    a::c1ass('form-control'),
                                    a::placeholder( trans('placeholder.retype.password') )
                                ),
                                $t->span( a::c1ass ('glyphicon glyphicon-lock form-control-feedback') )
                            ]
                        ),
                        $t->div( a::c1ass('row'),
                            [
                                $t->div( a::c1ass('col-xs-8'),
                                    [
                                        $t->div( a::c1ass('checkbox icheck'),
                                            [
                                                $t->label(
                                                    [
                                                        $t->input( a::type('checkbox') ),
                                                        ' ' . trans('auth.remember.me')
                                                    ]
                                                )
                                            ]
                                        )
                                    ]
                                ),
                                $t->div( a::c1ass('col-xs-4'),
                                    [
                                        $t->button(
                                            a::type('submit'),
                                            a::c1ass('btn btn-success btn-block btn-flat'),
                                            trans('auth.signin')
                                        )
                                    ]
                                )
                            ]
                        ),
                        $t->input(a::type("hidden"), a::name("_token"), a::value( csrf_token() ))
//                        $t->a(
//                            a::href('#'), a::c1ass('forgot-password'),
//                            trans('auth.forgot.password')
//                        )
                    ]
                ),
                $t->div( a::c1ass('social-auth-links text-center'),
                    [
                        $t->p( trans('select.or') ),
                        $t->a( a::href('#'), a::c1ass("btn btn-block btn-social btn-facebook btn-flat"),
                            [
                                $t->i( a::c1ass("fa fa-facebook") ),
                                trans('auth.signin.facebook')
                            ]
                        ),
                        $t->a( a::href('#'), a::c1ass("btn btn-block btn-social btn-google-plus btn-flat"),
                            [
                                $t->i( a::c1ass("fa fa-google-plus") ),
                                trans('auth.signin.google')
                            ]
                        ),
                        $t->p( a::style('padding: 15px;'), trans('select.or') ),
                        $t->div( a::style('padding-bottom: 20px;'),
                            $t->a(
                                a::id('registerBtn'),
                                a::c1ass('btn btn-block bg-gray color-palette btn-flat pull-left'),
                                trans('auth.register')
                            ),
                            $t->a(
                                a::id('cancel'),
                                a::c1ass('btn bg-gray color-palette btn-flat hidden pull-right'),
                                a::style('text-align: right'),
                                trans('auth.cancel')
                            )
                        )

                    ]
                )
            ]
        );
    }

    /**
     * @param Tag $t
     * @return mixed
     */
    private function getInfoMessage($t)
    {

        if( Session::has('error') ) {

            return session('error');

        } else {

            return trans('auth.sign.to.start.session');
        }

    }

    private function getClasses()
    {

        if( session('error') ) {

            return 'alert alert-danger';

        } else {

            return '';
        }

    }
}