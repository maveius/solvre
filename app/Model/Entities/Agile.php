<?php

namespace Solvre\Model\Entities;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Traits\Identifiable;

/**
 * @Entity(repositoryClass="Solvre\Model\Repositories\AgileRepository")
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