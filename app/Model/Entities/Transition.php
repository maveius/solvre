<?php

namespace Solvre\Model\Entities;

use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="Solvre\Model\Repositories\TransitionRepository")
 * @Table(name="transition")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class Transition
{
    use Identifiable;

    /**
     * @ManyToOne(targetEntity="Workflow", inversedBy="transitions")
     * @JoinColumn(name="workflow_id", referencedColumnName="id")
     */
    private $workflow;
    /**
     * @OneToMany(targetEntity="Operation", mappedBy="transition")
     */
    private $operation = array();
    /**
     * @OneToOne(targetEntity="Status")
     * @JoinColumn(name="from_status_id", referencedColumnName="id")
     */
    public $from;
    /**
     * @OneToOne(targetEntity="Status")
     * @JoinColumn(name="to_status_id", referencedColumnName="id")
     */
    public $to;

    /**
     * @return mixed
     */
    public function getWorkflow()
    {
        return $this->workflow;
    }

    /**
     * @param mixed $workflow
     */
    public function setWorkflow($workflow)
    {
        $this->workflow = $workflow;
    }

    /**
     * @return mixed
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * @param mixed $operation
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }
}

?>