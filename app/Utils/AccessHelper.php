<?php

namespace Solvre\Utils;


use Auth;
use Solvre\Utils\UserUtils as Property;

class AccessHelper
{
    /**
     * @param string $controllerName
     * @return bool
     */
    public static function exists($controllerName)
    {
        return class_exists("Solvre\\Http\\Controllers\\Crud\\" . $controllerName . "Controller");
    }

    public static function hasPermission($item, $getLoggedUser)
    {
//        return $getLoggedUser->checkPermission( strtoupper($item) );
        return true;
    }

    public static function attemptBy($email, $password, $active) {

        return Auth::attempt([Property::EMAIL => $email, Property::PASSWORD => $password, Property::STATUS => $active]);
    }
}