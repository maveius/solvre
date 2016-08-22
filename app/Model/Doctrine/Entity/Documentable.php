<?php
/**
 * Created by PhpStorm.
 * User: maveius
 * Date: 03.03.16
 * Time: 20:27
 */

namespace Solvre\Model\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\MappedSuperclass;

/**
 * @MappedSuperclass
 * Class Documentable
 * @package Solvre\Model\Doctrine\Entity
 */
abstract class Documentable
{
    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @ManyToOne(targetEntity="Project", inversedBy="documentables")
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
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     */
    public function setProject($project)
    {
        $this->project = $project;
    }


}