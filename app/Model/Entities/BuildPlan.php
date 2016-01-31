<?php

namespace Solvre\Model\Entities;

use Solvre\Model\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity(repositoryClass="BuildPlanRepository")
 * @Table(name="build_plan")
 *
 * @access public
 * @author maveius
 * @package Solvre\Model\Entities
 */
class BuildPlan extends Plan
{

}