<?php

namespace Solvre\Model\Doctrine\Entity;

use Solvre\Model\Doctrine\Traits\ManyToOneUser;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Solvre\Model\Doctrine\Traits\Identifiable;

/**
 * @MappedSuperclass()
 *
 * @access public
 * @author maveius
 * @package Solvre\Model\Doctrine\Entity
 */
abstract class Board
{

    use ManyToOneUser;

    /**
     * @Column(type="string")
     */
    protected $name;

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