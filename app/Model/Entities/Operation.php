<?php

namespace Solvre\Model\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Solvre\Model\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="Solvre\Model\Repositories\OperationRepository")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class Operation
{

    use Identifiable;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @ManyToMany(targetEntity="Field", inversedBy="operations")
     * @JoinTable(
     *     name="operation_fields",
     *     joinColumns={
     *          @JoinColumn(name="operation_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *          @JoinColumn(name="field_id", referencedColumnName="id")
     *     }
     * )
     * @var array
     */
    private $fields = array();

    /**
     * @ManyToOne(targetEntity="Transition")
     * @JoinColumn(name="transition_id", referencedColumnName="id")
     *
     */
    private $transition;

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
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param array $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return mixed
     */
    public function getTransition()
    {
        return $this->transition;
    }

    /**
     * @param mixed $transition
     */
    public function setTransition($transition)
    {
        $this->transition = $transition;
    }

}

?>