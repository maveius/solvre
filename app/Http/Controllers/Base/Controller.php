<?php

namespace Solvre\Http\Controllers\Base;

use EntityManager as orm;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Solvre\Utils\StringUtils as Strings;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $_repositories;
    protected $_services;

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

    private function registerService($name)
    {
        $class = env('SERVICES_DIRECTORY') . ucfirst($name);
        $this->_services[$name] = new $class();
    }


    /**ENTITI
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

        if ( Strings::contains($name, "Service") ) {

            if ( ! isset($this->_services[$name]) ) {
                $this->registerService($name);
            }

            return $this->_services[$name];
        }


        return null;
    }

    public function __isset($name)
    {
        return isset($this->_repositories[$name]);
    }

    protected function saveOrUpdate($entity) {
        orm::persist($entity);
        orm::flush();
    }



}
