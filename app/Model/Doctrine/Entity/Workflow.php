<?php

namespace Solvre\Model\Doctrine\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Doctrine\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\WorkflowRepository")
 * @Table(name="workflow")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class Workflow {

    use Identifiable;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @OneToOne(targetEntity="Project")
     * @JoinColumn(name="project_id", referencedColumnName="id")
     * @var Project
     */
    private $project;

    /**
     * @OneToMany(targetEntity="Transition", mappedBy="workflow")
     */
    private $transitions = array();

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
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     */
    public function setProject($project)
    {
        $this->project = $project;
    }

    /**
     * @return mixed
     */
    public function getTransitions()
    {
        return $this->transitions;
    }

    /**
     * @param mixed $transitions
     */
    public function setTransitions($transitions)
    {
        $this->transitions = $transitions;
    }
}
?>