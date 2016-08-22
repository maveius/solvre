<?php

namespace Solvre\Model\Doctrine\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Illuminate\Contracts\Auth as Interfaces;
use LaravelDoctrine\ORM\Auth\Authenticatable;
use Solvre\Model\Doctrine\Traits\Identifiable;
use Solvre\Model\Doctrine\Traits\PersonalDetails;
use Solvre\Utils\UserUtils as Property;

/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\UserRepository")
 * @Table(name="user")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class User implements Interfaces\Authenticatable
{
    use Authenticatable,
        Identifiable,
        PersonalDetails;

    /**
     *  Permission[]
     */
    private $excludesPermission;

    /**
     * @OneToMany(targetEntity="Notification", mappedBy="user")
     */
    private $notifications = array();

    /**
     * @ManyToOne(targetEntity="Role", inversedBy="user")
     * @JoinColumn(name="role_id", referencedColumnName="id")
     */
    private $role;

    /**
     * @OneToMany(targetEntity="Issue", mappedBy="user")
     */
    private $issues = array();

    /**
     * @OneToMany(targetEntity="Comment", mappedBy="user")
     */
    private $comments = array();

    /**
     * @OneToMany(targetEntity="UserInProject", mappedBy="user")
     */
    private $projects = array();

    /**
     * @OneToMany(targetEntity="Dashboard", mappedBy="user")
     */
    private $dashboards = array();

    /**
     * @OneToMany(targetEntity="Board", mappedBy="user")
     */
    private $boards = array();

    /**
     * @Column(name="status", type="string", nullable=true)
     * @var string $status
     */
    private $status;

    /**
     * @OneToMany(targetEntity="Activity", mappedBy="user")
     */
    private $activities = array();

    /**
     * User constructor.
     */
    public function __construct()
    {
        if( func_num_args() > 0 ) {
            $arguments = func_get_arg(0);

            $fullname = explode(" ", $arguments[Property::FULL_NAME]);

            $this->firstName = $fullname[Property::FIRST_NAME_IDX];
            $this->lastName = $fullname[Property::LAST_NAME_IDX];

            $this->email = $arguments[Property::EMAIL];
            $this->password = $arguments[Property::PASSWORD];

            $this->created = new DateTime();
            $this->updated = new DateTime();

            $this->status = 'CREATED';
        }
    }

    /**
     * @return mixed
     */
    public function getExcludesPermission()
    {
        return $this->excludesPermission;
    }

    /**
     * @param mixed $excludesPermission
     */
    public function setExcludesPermission($excludesPermission)
    {
        $this->excludesPermission = $excludesPermission;
    }

    /**
     * @return Notification
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * @param Notification $notifications
     */
    public function setNotifications($notifications)
    {
        $this->notifications = $notifications;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
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
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * @param mixed $projects
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;
    }

    /**
     * @return mixed
     */
    public function getDashboards()
    {
        return $this->dashboards;
    }

    /**
     * @param mixed $dashboards
     */
    public function setDashboards($dashboards)
    {
        $this->dashboards = $dashboards;
    }

    /**
     * @return mixed
     */
    public function getBoards()
    {
        return $this->boards;
    }

    /**
     * @param mixed $boards
     */
    public function setBoards($boards)
    {
        $this->boards = $boards;
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function hasRole($roleName)
    {
        if( $this->getRole() != null ) {
            return $this->getRole()->getName() === $roleName;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * @param mixed $activities
     */
    public function setActivities($activities)
    {
        $this->activities = $activities;
    }

}

?>