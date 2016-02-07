<?php

namespace Solvre\Model\Doctrine\Entity;

use Solvre\Model\Doctrine\Traits\ManyToOneUser;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Doctrine\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\KanbanRepository")
 * @Table(name="kanban_board")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class Kanban extends Board
{

    use Identifiable;
}