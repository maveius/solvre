<?php
namespace Solvre\Utils;


class UserUtils
{
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const FULL_NAME = 'fullname';
    const STATUS = 'status';
    const LOGIN = 'login';

    const FIRST_NAME_IDX = 0;
    const LAST_NAME_IDX = 1;

    public static function match($password, $retypedPassword)
    {
        return $password === $retypedPassword;
    }

//    public static
}