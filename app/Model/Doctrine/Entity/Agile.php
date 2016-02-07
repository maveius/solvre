<?php

namespace Solvre\Model\Doctrine\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Doctrine\Traits\Identifiable;

/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\AgileRepository")
 * @Table(name="agile_board")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class Agile extends Board
{
    use Identifiable;

    /**
     * @OneToMany(targetEntity="Sprint", mappedBy="agile")
     * @var Sprint
     *  *
     */
    public $sprints = array();
}