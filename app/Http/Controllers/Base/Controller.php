<?php

namespace Solvre\Http\Controllers\Base;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Solvre\Utils\StringUtils as Strings;
use \EntityManager as orm;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $_repositories;

    protected function getRepository() {

        return orm::getRepository(get_called_class());
    }

    /**
     * @param $name
     * @return string
     */
    public function getClassName($name)
    {
        return env('ENTITIES_DIRECTORY') . ucfirst(substr($name, 0, -10));
    }

    /**
     * @param $name
     * @internal param $class
     */
    public function registerRepository($name)
    {
        $this->_repositories[$name] =
            orm::getRepository($this->getClassName($name));
    }


    /**
     * Magic field
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {

        if ( Strings::contains($name, "Repository") ) {

            if (!$this->__isset($name)) {
                $this->registerRepository($name);
            }

            return $this->_repositories[$name];
        }

        return null;
    }

    public function __isset($name)
    {
        return isset($this->_repositories[$name]);
    }

}
