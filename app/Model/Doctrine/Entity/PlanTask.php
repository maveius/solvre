<?php

namespace Solvre\Model\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToOne;
use Solvre\Model\Doctrine\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\PlanTaskRepository")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class PlanTask
{

    use Identifiable;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @ManyToOne(targetEntity="Stage", inversedBy="planTasks")
     * @JoinColumn(name="stage_id", referencedColumnName="id")
     */
    private $stage;

    /**
     * @ManyToOne(targetEntity="PlanTaskType")
     * @JoinColumn(name="plan_task_type_id", referencedColumnName="id")
     */
    private $planTaskType;

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
     * @return mixed
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * @param mixed $stage
     */
    public function setStage($stage)
    {
        $this->stage = $stage;
    }

    /**
     * @return mixed
     */
    public function getPlanTaskType()
    {
        return $this->planTaskType;
    }

    /**
     * @param mixed $planTaskType
     */
    public function setPlanTaskType($planTaskType)
    {
        $this->planTaskType = $planTaskType;
    }

}

?>