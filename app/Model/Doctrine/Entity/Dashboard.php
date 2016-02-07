<?php

namespace Solvre\Model\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Doctrine\Traits\Identifiable;
use Solvre\Model\Doctrine\Traits\ManyToOneUser;

/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\DashboardRepository")
 * @Table(name="dashboard")
 *
 * @access public
 * @author maveius
 * @package Solvre\Model\Doctrine\Entity
 */
class Dashboard
{

    use Identifiable,
        ManyToOneUser;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @OneToMany(targetEntity="Widget", mappedBy="dashboard")
     */
    private $widgets = array();

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
    public function getWidgets()
    {
        return $this->widgets;
    }

    /**
     * @param mixed $widgets
     */
    public function setWidgets($widgets)
    {
        $this->widgets = $widgets;
    }


}

?>