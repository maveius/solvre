<?php
/**
 * Created by PhpStorm.
 * User: maveius
 * Date: 03.03.16
 * Time: 22:08
 */

namespace Solvre\Model\Doctrine\Entity;


use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Doctrine\Traits\Identifiable;
use Solvre\Model\Doctrine\Traits\ManyToOneUser;

/**
 * @Entity
 * @Table("activity")
 * Class Activity
 * @package Solvre\Model\Doctrine\Entity
 */
class Activity
{
    use Identifiable,
        ManyToOneUser;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @Column(type="text", nullable=true)
     */
    private $oldValue;

    /**
     * @Column(type="text")
     */
    private $newValue;

    /**
     * @Column(type="string")
     */
    private $activityType;

    /**
     * @ManyToOne(targetEntity="Issue")
     * @JoinColumn(name="issue")
     * @var Issue
     */
    private $issue;

    /**
     * @ManyToOne(targetEntity="WikiPage")
     * @JoinColumn(name="wiki_page")
     * @var WikiPage
     */
    private $wikiPage;

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
    public function getOldValue()
    {
        return $this->oldValue;
    }

    /**
     * @param mixed $oldValue
     */
    public function setOldValue($oldValue)
    {
        $this->oldValue = $oldValue;
    }

    /**
     * @return mixed
     */
    public function getNewValue()
    {
        return $this->newValue;
    }

    /**
     * @param mixed $newValue
     */
    public function setNewValue($newValue)
    {
        $this->newValue = $newValue;
    }

    /**
     * @return mixed
     */
    public function getActivityType()
    {
        return $this->activityType;
    }

    /**
     * @param mixed $activityType
     */
    public function setActivityType($activityType)
    {
        $this->activityType = $activityType;
    }

    /**
     * @return Issue
     */
    public function getIssue()
    {
        return $this->issue;
    }

    /**
     * @param Issue $issue
     */
    public function setIssue($issue)
    {
        $this->issue = $issue;
    }

    /**
     * @return WikiPage
     */
    public function getWikiPage()
    {
        return $this->wikiPage;
    }

    /**
     * @param WikiPage $wikiPage
     */
    public function setWikiPage($wikiPage)
    {
        $this->wikiPage = $wikiPage;
    }

}