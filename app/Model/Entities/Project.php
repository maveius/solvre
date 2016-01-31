<?php

namespace Solvre\Model\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\OneToOne;
use Solvre\Model\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="ProjectRepository")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class Project
{

    use Identifiable;

    /**
     * @Column(type="string")
     */
    private $key;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @OneToMany(targetEntity="UserInProject", mappedBy="project")
     * @var array
     * *
     */
    private $users = array();

    /**
     * @OneToMany(targetEntity="Issue", mappedBy="project")
     */
    private $issues = array();

    /**
     * @OneToOne(targetEntity="Workflow", mappedBy="project")
     * @var Workflow
     */
    private $workflow;

    /**
     * @OneToMany(targetEntity="Field", mappedBy="project")
     */
    private $fields = array();

    /**
     * @OneToMany(targetEntity="Plan", mappedBy="project")
     */
    private $plans = array();

    /**
     * @OneToMany(targetEntity="Version", mappedBy="project")
     */
    private $versions;

    /**
     * @OneToMany(targetEntity="NotificationTemplate", mappedBy="project")
     */
    private $notificationTemplates = array();

    /**
     * @OneToMany(targetEntity="Diagram", mappedBy="project")
     */
    private $diagrams;

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

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
     * @return array
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param array $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
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

    /**
     * @return Workflow
     */
    public function getWorkflow()
    {
        return $this->workflow;
    }

    /**
     * @param Workflow $workflow
     */
    public function setWorkflow($workflow)
    {
        $this->workflow = $workflow;
    }

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param mixed $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return mixed
     */
    public function getPlans()
    {
        return $this->plans;
    }

    /**
     * @param mixed $plans
     */
    public function setPlans($plans)
    {
        $this->plans = $plans;
    }

    /**
     * @return mixed
     */
    public function getVersions()
    {
        return $this->versions;
    }

    /**
     * @param mixed $versions
     */
    public function setVersions($versions)
    {
        $this->versions = $versions;
    }

    /**
     * @return mixed
     */
    public function getNotificationTemplates()
    {
        return $this->notificationTemplates;
    }

    /**
     * @param mixed $notificationTemplates
     */
    public function setNotificationTemplates($notificationTemplates)
    {
        $this->notificationTemplates = $notificationTemplates;
    }

    /**
     * @return mixed
     */
    public function getDiagrams()
    {
        return $this->diagrams;
    }

    /**
     * @param mixed $diagrams
     */
    public function setDiagrams($diagrams)
    {
        $this->diagrams = $diagrams;
    }
}

?>