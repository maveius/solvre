<?php

namespace Solvre\Model\Doctrine\Entity;

use Solvre\Model\Doctrine\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\DeploymentPlanRepository")
 * @Table(name="deployment_plan")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class DeploymentPlan extends Plan
{
}