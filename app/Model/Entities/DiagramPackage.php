<?php
/**
 * Created by PhpStorm.
 * User: maveius
 * Date: 26.01.16
 * Time: 22:43
 */

namespace Solvre\Model\Entities;


use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Traits\Identifiable;

/**
 * @Entity(repositoryClass="DiagramPackageRepository")
 * @Table(name="diagram_package")
 *
 * @access public
 * @author maveius
 * @package Solvre\Model\Entities
 */
class DiagramPackage
{
    use Identifiable;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @OneToMany(targetEntity="Diagram", mappedBy="diagramPackage")
     */
    private $diagrams;

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
    public function getDiagrams()
    {
        return $this->diagrams;
    }

    /**
     * @param mixed $diagrams
     */
    public function setDiagrams($diagrams)
    {
        $this->diagrams = $diagrams;
    }
}