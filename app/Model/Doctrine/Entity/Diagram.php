<?php

namespace Solvre\Model\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Doctrine\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\DiagramRepository")
 * @Table(name="diagram")
 *
 * @access public
 * @author maveius
 * @package Solvre\Model\Doctrine\Entity
 */
class Diagram
{

    use Identifiable;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @Column(type="json")
     */
    private $content;

    /**
     * @ManyToOne(targetEntity="DiagramPackage", inversedBy="diagrams")
     * @JoinColumn(name="diagram_package_id", referencedColumnName="id")
     * @var DiagramPackage
     */
    private $diagramPackage;

    /**
     * @ManyToOne(targetEntity="DiagramCategory")
     * @JoinColumn(name="diagram_category_id", referencedColumnName="id")
     * @var DiagramCategory
     */
    private $diagramCategory;


    /**
     * @ManyToOne(targetEntity="Project", inversedBy="diagrams")
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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return DiagramPackage
     */
    public function getDiagramPackage()
    {
        return $this->diagramPackage;
    }

    /**
     * @param DiagramPackage $diagramPackage
     */
    public function setDiagramPackage($diagramPackage)
    {
        $this->diagramPackage = $diagramPackage;
    }

    /**
     * @return DiagramCategory
     */
    public function getDiagramCategory()
    {
        return $this->diagramCategory;
    }

    /**
     * @param DiagramCategory $diagramCategory
     */
    public function setDiagramCategory($diagramCategory)
    {
        $this->diagramCategory = $diagramCategory;
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

?>