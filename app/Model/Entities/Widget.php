<?php

namespace Solvre\Model\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="WidgetRepository")
 * @Table(name="widget")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class Widget
{
    use Identifiable;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @ManyToOne(targetEntity="Dashboard", inversedBy="widgets")
     * @JoinColumn(name="dashboard_id", referencedColumnName="id")
     * @var Dashboard
     */
    private $dashboard;

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
     * @return Dashboard
     */
    public function getDashboard()
    {
        return $this->dashboard;
    }

    /**
     * @param Dashboard $dashboard
     */
    public function setDashboard($dashboard)
    {
        $this->dashboard = $dashboard;
    }

}

?>