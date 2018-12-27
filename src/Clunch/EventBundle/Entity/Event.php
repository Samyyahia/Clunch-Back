<?php

namespace Clunch\EventBundle\Entity;

/**
 * Event
 */
class Event
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $recipe;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var \DateTime
     */
    private $date;


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
     * Set recipe
     *
     * @param string $recipe
     *
     * @return Event
     */
    public function setRecipe($recipe)
    {
        $this->recipe = $recipe;

        return $this;
    }

    /**
     * Get recipe
     *
     * @return string
     */
    public function getRecipe()
    {
        return $this->recipe;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Event
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Event
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * @var \Clunch\UserBundle\Entity\User
     */
    private $user;


    /**
     * Set user
     *
     * @param \Clunch\UserBundle\Entity\User $user
     *
     * @return Event
     */
    public function setUser(\Clunch\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Clunch\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
