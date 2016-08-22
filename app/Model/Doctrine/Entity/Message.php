<?php
/**
 * Created by PhpStorm.
 * User: maveius
 * Date: 12.02.16
 * Time: 21:34
 */

namespace Solvre\Model\Doctrine\Entity;


use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Solvre\Model\Doctrine\Traits\Identifiable;
use Solvre\Model\Doctrine\Traits\ManyToOneUser;

/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\MessageRepository")
 * @Table(name="message")
 *
 * Class Message
 * @package Solvre\Model\Doctrine\Entity
 */
class Message
{

    use Identifiable,
        ManyToOneUser;

    /**
     * @Column(name="code", type="text")
     * @var string $code
     */
    private $code;

    /**
     * @Column(name="active", type="boolean", nullable=true)
     * @var boolean $active
     */
    private $active;

    /**
     * @Column(name="content", type="text")
     */
    private $content;

    /**
     * @Column(name="subject", type="string", nullable=true)
     */
    private $subject;

    /**
     * @Column(name="sent_from", type="string")
     */
    private $sentFrom;

    /**
     * @Column(name="sent_to", type="string")
     */
    private $sentTo;

    /**
     * @Column(name="sent", type="boolean", nullable=true)
     */
    private $sent;

    /**
     * @Column(name="to_full_name", type="string", nullable=true)
     */
    private $toFullName;

    /**
     * Message constructor.
     */
    public function __construct()
    {
        $this->sent = false;
        $this->created = new DateTime();
        $this->updated = new DateTime();
    }


    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getSentFrom()
    {
        return $this->sentFrom;
    }

    /**
     * @param string $sentFrom
     */
    public function setSentFrom($sentFrom)
    {
        $this->sentFrom = $sentFrom;
    }

    /**
     * @return string
     */
    public function getSentTo()
    {
        return $this->sentTo;
    }

    /**
     * @param string $sentTo
     */
    public function setSentTo($sentTo)
    {
        $this->sentTo = $sentTo;
    }

    /**
     * @return mixed
     */
    public function getSent()
    {
        return $this->sent;
    }

    /**
     * @param mixed $sent
     */
    public function setSent($sent)
    {
        $this->sent = $sent;
    }

    /**
     * @return string
     */
    public function getToFullName()
    {
        return $this->toFullName;
    }

    /**
     * @param string $toFullName
     */
    public function setToFullName($toFullName)
    {
        $this->toFullName = $toFullName;
    }


}