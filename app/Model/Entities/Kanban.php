<?php

namespace Solvre\Model\Entities;

use Solvre\Model\Traits\ManyToOneUser;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="Solvre\Model\Repositories\KanbanRepository")
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