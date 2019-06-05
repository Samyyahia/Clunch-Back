<?php

namespace Clunch\CommentBundle\Entity;

/**
 * Comment
 */
class Comment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $content;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Comment
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
     * Set content
     *
     * @param string $content
     *
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * @var \Clunch\EventBundle\Entity\Event
     */
    private $event;


    /**
     * Set event
     *
     * @param \Clunch\EventBundle\Entity\Event $event
     *
     * @return Comment
     */
    public function setEvent(\Clunch\EventBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Clunch\EventBundle\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
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
     * @return Comment
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


    /**
     * @return string
     */
    public function __toString()
    {
        if (!$this->content) {
            return '';
        }

        return $this->content;
    }
}
