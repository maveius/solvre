<?php

namespace Solvre\Model\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\OneToMany;
use Solvre\Model\Doctrine\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\PlanTaskTypeRepository")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class PlanTaskType
{

    use Identifiable;

    /**
     * @Column(type="string")
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