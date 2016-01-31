<?php

namespace Solvre\Model\Entities;

use Solvre\Model\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity(repositoryClass="DeploymentPlanRepository")
 * @Table(name="deployment_plan")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class DeploymentPlan extends Plan
{
}