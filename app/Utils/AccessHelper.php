<?php

namespace Solvre\Utils;


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
}