<?php

namespace Solvre\Services;


use Closure;
use Crypt;
use Illuminate\Mail\Message;
use Mail;
use Solvre\Views\Email\MailContent;

class MessageService
{

    private $_mailContent;

    /**
     * @param string $content
     * Associative Array of variables
     * @param $callback
     */
    public function sendMail($content, $callback) {

        /** @noinspection PhpUnusedParameterInspection */
        Mail::send( 'emails.template', [ 'content' => $content ], function ($message) use ($callback) {
            $callback($message);
        } );
    }

    /**
     * @param string $replace
     * @return mixed
     */
    public function getToken($replace) {

        return Crypt::encrypt(
            bcrypt(
                str_ireplace(
                    "==",
                    $replace,
                    base64_encode(time())
                )
            )
        );
    }

    /**
     * @return MailContent
     */
    public function getMailContent()
    {
        if( $this->_mailContent == null ) {
            $this->_mailContent = new MailContent();
        }
        return $this->_mailContent;
    }
}