<?php

namespace Solvre\Model\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use liphte\tags\components\Renderable;
use Solvre\Model\Doctrine\Traits\ManyToOneUser;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Solvre\Model\Doctrine\Traits\Identifiable;
use Doctrine\ORM\Mapping\Entity;
use liphte\tags\html\Tag;
use liphte\tags\html\Attribute as a;


/**
 * @Entity(repositoryClass="Solvre\Model\Doctrine\Repository\NotificationRepository")
 *
 * @access public
 * @author maveius
 * @package Model
 */
class Notification implements Renderable
{

    use Identifiable,
        ManyToOneUser;

    /**
     * @Column(name="is_read", type="boolean")
     */
    private $isRead;

    /**
     * @Column(type="boolean")
     */
    private $url;

    /**
     * @ManyToOne(targetEntity="NotificationTemplate")
     * @JoinColumn(name="notification_template_id", referencedColumnName="id")
     */
    private $notificationTemplate;

    /**
     * @return NotificationTemplate
     */
    public function getNotificationTemplate()
    {
        return $this->notificationTemplate;
    }

    /**
     * @param NotificationTemplate $notificationTemplate
     */
    public function setNotificationTemplate($notificationTemplate)
    {
        $this->notificationTemplate = $notificationTemplate;
    }

    /**
     * @return mixed
     */
    public function getIsRead()
    {
        return $this->isRead;
    }

    /**
     * @param mixed $isRead
     */
    public function setIsRead($isRead)
    {
        $this->isRead = $isRead;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function render()
    {
        $t = new Tag();
        $iconClass = $this->getNotificationTemplate()->getIconClass();
        $colorClass = $this->getNotificationTemplate()->getColorClass();

        return $t->li(
            $t->a(a::href($this->getUrl()),
                $t->i(a::c1ass("fa $iconClass text-$colorClass")),
                $this->getNotificationTemplate()->getDescription()
            )
        );
    }
}

?>