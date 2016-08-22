<?php
namespace Solvre\Model\Doctrine\Traits;


use Doctrine\ORM\Mapping\Entity;

trait OrmSaver
{
    /**
     * @param $entity
     */
    public function save($entity) {

        /** @noinspection PhpUndefinedMethodInspection */
        $this->_em->persist($entity);
        /** @noinspection PhpUndefinedMethodInspection */
        $this->_em->flush();
    }
}