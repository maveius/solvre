<?php

namespace Solvre\Model\Entities;

use Solvre\Model\Traits\ManyToOneUser;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Solvre\Model\Traits\Identifiable;

/**
 * @MappedSuperclass()
 *
 * @access public
 * @author maveius
 * @package Solvre\Model\Entities
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