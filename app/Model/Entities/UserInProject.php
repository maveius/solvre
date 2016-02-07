<?php

namespace Solvre\Model\Entities;

use Solvre\Model\Traits\ManyToOneUser;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;
use Solvre\Utils\ProjectRole;

/**
 * @Entity(repositoryClass="Solvre\Model\Repositories\UserInProjectRepository")
 * @Table(name="users_in_projects")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class UserInProject
{

    use Identifiable,
        ManyToOneUser;

    /**
     * @Column(type="string", name="project_role")
     */
    private $projectRole;


    /**
     * @ManyToOne(targetEntity="Project", inversedBy="users")
     * @JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @return mixed
     */
    public function getProjectRole()
    {
        return $this->projectRole;
    }

    /**
     * @param mixed $projectRole
     */
    public function setProjectRole($projectRole)
    {
        $this->projectRole = $projectRole;
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
}

?>