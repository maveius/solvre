<?php

namespace Solvre\Views\Email;


use liphte\tags\components\Renderable;
use liphte\tags\html\Attribute as a;
use liphte\tags\html\Tag;
use Solvre\Model\Doctrine\Entity\User;
use URL;


/**
 * @property string template
 */
class MailContent
{
    /**
     * @param User $user
     * @param string $token
     * @return string
     */
    public function accountActivation( $user, $token )
    {
        $t = new Tag();

        /** @noinspection PhpMethodParametersCountMismatchInspection */
        return $t->div( a::id('content'), a::style('width: 710px; text-align: left;'),
            $t->p(
                $t->b(
                    trans('email.welcome') . ' ' . $user->getFirstName()
                )
            ),
            $t->p(
              trans(
                  'email.your.account.has.been.created',
                  [ 'solvreUrl'=>solvreUrl() ]
              )
            ),
            $t->span(
                trans('email.please.activate.account.by.link')
            ),
            $t->span( a::style('word-wrap: break-word;'),
                trans('email.activation.link'),
                URL::to('/activate', array($token))
            ),
            $t->br()
        );
    }
}