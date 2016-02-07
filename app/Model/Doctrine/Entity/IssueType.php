<?php

namespace Solvre\Model\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Doctrine\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\IssueTypeRepository")
 * @Table(name="issue_type")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class IssueType
{

    use Identifiable;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @Column(type="string", name="image_path")
     */

    private $imagePath;

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
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * @param mixed $imagePath
     */
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
    }


}

?>