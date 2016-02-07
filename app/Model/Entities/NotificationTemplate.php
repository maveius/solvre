<?php

namespace Solvre\Model\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Solvre\Model\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="Solvre\Model\Repositories\NotificationTemplateRepository")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class NotificationTemplate
{

    use Identifiable;

    /**
     *  @Column(type="string")
     */
    private $name;


    /**
     *  @Column(type="string")
     */
    private $description;


    /**
     * @Column(type="string")
     */
    private $iconClass;


    /**
     * @Column(type="string")
     */
    private $colorClass;

    /**
     * @OneToMany(targetEntity="Notification", mappedBy="notificationTemplate")
     */
    private $notifications = array();


    /**
     * @ManyToOne(targetEntity="Project")
     * @JoinColumn(name="project_id", referencedColumnName="id")
     * @var Project
     */
    private $project;



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
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * @param mixed $notifications
     */
    public function setNotifications($notifications)
    {
        $this->notifications = $notifications;
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
    public function getIconClass()
    {
        return $this->iconClass;
    }

    /**
     * @param mixed $iconClass
     */
    public function setIconClass($iconClass)
    {
        $this->iconClass = $iconClass;
    }

    /**
     * @return mixed
     */
    public function getColorClass()
    {
        return $this->colorClass;
    }

    /**
     * @param mixed $colorClass
     */
    public function setColorClass($colorClass)
    {
        $this->colorClass = $colorClass;
    }
}

?>