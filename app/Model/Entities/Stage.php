<?php

namespace Solvre\Model\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="Solvre\Model\Repositories\StageRepository")
 * @Table(name="stage")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class Stage
{
    use Identifiable;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @ManyToOne(targetEntity="Plan")
     * @JoinColumn(name="plan_id", referencedColumnName="id")
     */
    private $plan;

    /**
     * @OneToMany(targetEntity="PlanTask", mappedBy="stage")
     */
    private $planTasks = array();

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

    /**
     * @return Plan
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * @param Plan $plan
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
    }

    /**
     * @return mixed
     */
    public function getPlanTasks()
    {
        return $this->planTasks;
    }

    /**
     * @param mixed $planTasks
     */
    public function setPlanTasks($planTasks)
    {
        $this->planTasks = $planTasks;
    }
}

?>