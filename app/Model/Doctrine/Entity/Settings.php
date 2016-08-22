<?php

namespace Solvre\Model\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Doctrine\Traits\Identifiable;

/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\SettingsRepository")
 * @Table(name="settings")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class Settings
{
    use Identifiable;

    /**
     * @Column(name="property_name", type="string")
     * @var string $propertyName
     */
    private $propertyName;

    /**
     * @Column(name="property_value", type="string")
     * @var string $propertyValue
     */
    private $propertyValue;

    /**
     * @return string
     */
    public function getPropertyName()
    {
        return $this->propertyName;
    }

    /**
     * @param string $propertyName
     */
    public function setPropertyName($propertyName)
    {
        $this->propertyName = $propertyName;
    }

    /**
     * @return string
     */
    public function getPropertyValue()
    {
        return $this->propertyValue;
    }

    /**
     * @param string $propertyValue
     */
    public function setPropertyValue($propertyValue)
    {
        $this->propertyValue = $propertyValue;
    }
}