<?php

namespace Solvre\Model\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="Solvre\Model\Repositories\SprintRepository")
 * @Table(name="sprint")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class Sprint
{

    use Identifiable;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @Column(type="date", name="start_date")
     */
    private $startDate;

    /**
     * @Column(type="date", name="end_date")
     */
    private $endDate;

    /**
     * @OneToOne(targetEntity="Version")
     * @JoinColumn(name="version_id", referencedColumnName="id")
     */
    private $version;

    /**
     * @ManyToOne(targetEntity="Agile", inversedBy="sprints")
     * @JoinColumn(name="agile_id", referencedColumnName="id")
     */
    public $agile;

    /**
     * @OneToMany(targetEntity="Issue", mappedBy="sprint")
     */
    private $issues = array();

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
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return mixed
     */
    public function getAgile()
    {
        return $this->agile;
    }

    /**
     * @param mixed $agile
     */
    public function setAgile($agile)
    {
        $this->agile = $agile;
    }

    /**
     * @return mixed
     */
    public function getIssues()
    {
        return $this->issues;
    }

    /**
     * @param mixed $issues
     */
    public function setIssues($issues)
    {
        $this->issues = $issues;
    }
}

?>