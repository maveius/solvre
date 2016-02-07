<?php

namespace Solvre\Model\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="Solvre\Model\Repositories\ServerRepository")
 * @Table(name="server")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class Server
{

    use Identifiable;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @Column(type="string")
     */
    private $address;

    /**
     * @Column(type="string")
     */
    private $port;

    /**
     * @Column(type="string", name="connection_type")
     */
    private $connectionType;

    /**
     * @ManyToMany(targetEntity="Plan", inversedBy="servers")
     * @JoinTable(
     *     name="server_plans",
     *     joinColumns={
     *          @JoinColumn(name="server_id", referencedColumnName="id")
     *    },
     *    inverseJoinColumns={
     *         @JoinColumn(name="plan_id", referencedColumnName="id")
     *    }
     * )
     */
    private $plans;

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
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    public function getConnectionType()
    {
        return $this->connectionType;
    }

    /**
     * @param mixed $connectionType
     */
    public function setConnectionType($connectionType)
    {
        $this->connectionType = $connectionType;
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
}

?>