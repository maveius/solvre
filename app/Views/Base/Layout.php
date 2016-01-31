<?php


namespace Solvre\Views\Base;


use html\Attributes;
use liphte\tags\html\Attribute as a;
use Solvre\Views\Base\LayoutBase;
use Illuminate\Http\Request;
use liphte\tags\html\Tag;

class Layout extends LayoutBase
{

    private function head(Tag $t, $controllerName)
    {
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        return $t->head(
            [
                $t->meta( a::charset('utf-8')),
                $t->meta( a::content('IE=Edge'), a::httpEquiv("X-UA-Compatible")),
                $t->meta( a::name('viewport'), a::content("width=device-width", "initial-scale=1")),
                $t->meta( a::name('author'), a::content('maveius') ),
                $t->meta( a::name('description'), a::content("Bug Report and Issue Tracker System Open Source")),


                $t->title( trans('layout.name') . ' - ' . trans('layout.title') ),

                $t->link(
                    a::rel('icon'),
                    a::type('image/png'),
                    a::href(asset('img/favicon.png'))
                ),
                $t->link(
                    a::rel('stylesheet'),
                    a::href(asset('css/layout.css'))
                ),
                $t->link(
                    a::rel('stylesheet'),
                    a::href(asset('css/' . $controllerName . '.css'))
                ),

                $t->script(
                    a::src(asset('js/lib/jquery/jquery-2.1.4.min.js'))
                ),
                $t->script(
                    a::src(asset('lib/bootstrap-3.3.6-dist/js/bootstrap.min.js'))
                ),
                $this->getHeaderJs(),
                $this->getIEHacks()
            ]
        );

    }

    private function body(Tag $t, $controllerName)
    {

        return $t->body( new Attributes( $this->getBodyAttributes() ),
            [
                $this->getContent(),
                $this->getFooterJs(),
                $this->getControllerJs($t, $controllerName ),
            ]
        );

    }

    /**
     * @param Request $request
     * @return string
     */
    public function render(Request $request)
    {
        $t = $this->t;

        $path = $request->path();
        if( $path === '/' ) {
            $path = 'login/index';
        }

        ///** @noinspection PhpUndefinedMethodInspection */
        $controllerName = explode("/", $path)[0];

        return $t->doctype(
                $t->html(a::lang('pl'),
                    [
                        $this->head($t, $controllerName),
                        $this->body($t, $controllerName)
                    ]
                )
            );
    }

    private function getIEHacks()
    {
        $t = $this->t;

        $comment = "!--";
        return implode('',
            [
                $t->$comment("HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries"),
                $t->$comment("WARNING: Respond.js doesn't work if you view the page via file://"),
                $t->$comment(
                    [
                        '[if lt IE 9]',
                        $t->script( a::src("https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js") ),
                        $t->script( a::src("https://oss.maxcdn.com/respond/1.4.2/respond.min.js") ),
                        '[endif]'
                    ]
                )
            ]
        );
    }

    private function getControllerJs(Tag $t, $controllerName)
    {
        $path = 'js/'. $controllerName . '.js';

        if ( file_exists( $path ) ) {
            return $t->script(
                a::src( asset( $path ) )
            );
        }


    }


}