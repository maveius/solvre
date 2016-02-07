<?php

namespace Solvre\Model\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="Solvre\Model\Repositories\FieldRepository")
 * @Table(name="field")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class Field
{

    use Identifiable;

    /**
     *  @Column(type="string")
     */
    private $name;

    /**
     *  @Column(type="string")
     */
    private $value;

    /**
     * @ManyToOne(targetEntity="Project", inversedBy="fields")
     * @JoinColumn(name="project_id", referencedColumnName="id")
     * @var Project
     */
    private $project;

    /**
     *
     * @ManyToMany(targetEntity="Operation", inversedBy="fields")
     * @var array
     */
    private $operations = array();


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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
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
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * @param mixed $operations
     */
    public function setOperations($operations)
    {
        $this->operations = $operations;
    }


}

?>