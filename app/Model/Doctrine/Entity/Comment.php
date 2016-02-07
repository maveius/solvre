<?php

namespace Solvre\Model\Doctrine\Entity;

use Solvre\Model\Doctrine\Traits\ManyToOneUser;
use Solvre\Model\Doctrine\Traits\Identifiable;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\CommentRepository")
 * @Table(name="comment")
 *
 * @access public
 * @author maveius
 * @package Solvre\Model\Doctrine\Entity
 */
class Comment
{

    use Identifiable,
        ManyToOneUser;

    /**
     * @Column(type="string")
     */
    private $content;

    /**
     * @ManyToOne(targetEntity="Issue", inversedBy="comments")
     * @JoinColumn(name="issue_id", referencedColumnName="id")
     * @var Issue
     */
    private $issue;

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


}

?>