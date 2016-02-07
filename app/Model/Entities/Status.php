<?php

namespace Solvre\Model\Entities;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="Solvre\Model\Repositories\StatusRepository")
 * @Table(name="status")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class Status {

    use Identifiable;

    /**
     *  @Column(type="string")
     */
    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
?>