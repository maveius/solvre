<?php

if (! function_exists('solvreUrl')) {
    /**
     * Generate an asset path for the application.
     *
     * @return string
     */
    function solvreUrl()
    {
        return app('url')->asset('/', $secure = null);
    }
}