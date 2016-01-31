<?php

namespace Solvre\Utils;


class StringUtils
{
    public static function contains($source, $string)
    {
        return strpos($source, $string) !== false;
    }
}