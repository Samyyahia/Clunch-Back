<?php

namespace Clunch\CompanyBundle\Entity;

/**
 * Company
 */
class Company
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $token;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Company
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \Clunch\UserBundle\Entity\User $user
     *
     * @return Company
     */
    public function addUser(\Clunch\UserBundle\Entity\User $user)
    {
        $user->setCompany($this);

        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Clunch\UserBundle\Entity\User $user
     */
    public function removeUser(\Clunch\UserBundle\Entity\User $user)
    {
        $user->setCompany(null);

        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if (!$this->name) {
            return '';
        }

        return $this->name;
    }
}
