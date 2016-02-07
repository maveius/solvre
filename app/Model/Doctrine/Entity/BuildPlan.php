<?php

namespace Solvre\Model\Doctrine\Entity;

use Solvre\Model\Doctrine\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\BuildPlanRepository")
 * @Table(name="build_plan")
 *
 * @access public
 * @author maveius
 * @package Solvre\Model\Doctrine\Entity
 */
class BuildPlan extends Plan
{

}