<?php
/**
 * Created by PhpStorm.
 * User: maveius
 * Date: 22.01.16
 * Time: 20:36
 */

namespace Solvre\Model\Doctrine\Traits;


use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Solvre\Model\Doctrine\Entity\User;

trait ManyToOneUser
{
    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     * @var User
     */
    private $user;

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

}