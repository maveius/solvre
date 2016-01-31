<?php
/**
 * Created by PhpStorm.
 * User: maveius
 * Date: 26.01.16
 * Time: 22:54
 */

namespace Solvre\Model\Entities;


use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Traits\Identifiable;

/**
 * @Entity(repositoryClass="DiagramCategoryRepository")
 * @Table(name="diagram_category")
 *
 * @access public
 * @author maveius
 * @package Solvre\Model\Entities
 */
class DiagramCategory
{
    use Identifiable;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @ManyToOne(targetEntity="DiagramCategory", inversedBy="subCategories")
     * @JoinColumn(name="parent_category_id", referencedColumnName="id")
     */
    private $parentCategory;

    /**
     * @OneToMany(targetEntity="DiagramCategory", mappedBy="parentCategory")
     */
    private $subCategories;



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
    public function getParentCategory()
    {
        return $this->parentCategory;
    }

    /**
     * @param mixed $parentCategory
     */
    public function setParentCategory($parentCategory)
    {
        $this->parentCategory = $parentCategory;
    }

    /**
     * @return mixed
     */
    public function getSubCategories()
    {
        return $this->subCategories;
    }

    /**
     * @param mixed $subCategories
     */
    public function setSubCategories($subCategories)
    {
        $this->subCategories = $subCategories;
    }
}