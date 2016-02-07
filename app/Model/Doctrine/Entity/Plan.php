<?php

namespace Solvre\Model\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Solvre\Model\Doctrine\Traits\Identifiable;

/**
 * @MappedSuperclass()
 *
 * @access public
 * @author maveius
 * @package Solvre\Model\Doctrine\Entity
 */
abstract class Plan
{

    use Identifiable;
    /**
     * @Column(type="string")
     */
    protected $name;

    /**
     * @ManyToOne(targetEntity="Project", inversedBy="plan")
     * @JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @ManyToMany(targetEntity="Server", mappedBy="plans")
     */
    protected $servers;

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
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param mixed $project
     */
    public function setProject($project)
    {
        $this->project = $project;
    }

    /**
     * @return mixed
     */
    public function getServers()
    {
        return $this->servers;
    }

    /**
     * @param mixed $servers
     */
    public function setServers($servers)
    {
        $this->servers = $servers;
    }
}

?>