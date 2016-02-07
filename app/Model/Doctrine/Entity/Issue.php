<?php

namespace Solvre\Model\Doctrine\Entity;

use Solvre\Model\Doctrine\Traits\ManyToOneUser;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Doctrine\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\IssueRepository")
 * @Table(name="issue")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class Issue
{

    use Identifiable,
        ManyToOneUser;

    /**
     * @Column(type="string")
     */
    private $number;

    /**
     * @Column(type="string")
     */
    private $description;

    /**
     * @ManyToMany(targetEntity="Version")
     * @JoinTable(
     *     name="issue_versions",
     *     joinColumns={
     *          @JoinColumn(name="issue_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *          @JoinColumn(name="version_id", referencedColumnName="id")
     *     }
     * )
     */
    private $version;

    /**
     * @ManyToOne(targetEntity="Project")
     * @JoinColumn(name="project_id", referencedColumnName="id")
     * 1
     */
    private $project;

    /**
     * @ManyToOne(targetEntity="Sprint", inversedBy="issues")
     * @JoinColumn(name="sprint_id", referencedColumnName="id")
     */
    private $sprint;
    /**
     * @OneToMany(targetEntity="Comment", mappedBy="issue")
     */
    private $comments = array();
    /**
     * @ManyToOne(targetEntity="Status")
     * @JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;
    /**
     * @ManyToOne(targetEntity="IssueType")
     * @JoinColumn(name="issue_type_id", referencedColumnName="id")
     * @var IssueType
     */
    public $issueType;

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getSprint()
    {
        return $this->sprint;
    }

    /**
     * @param mixed $sprint
     */
    public function setSprint($sprint)
    {
        $this->sprint = $sprint;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return IssueType
     */
    public function getIssueType()
    {
        return $this->issueType;
    }

    /**
     * @param IssueType $issueType
     */
    public function setIssueType($issueType)
    {
        $this->issueType = $issueType;
    }


}

?>