<?php

namespace Clunch\NewsletterBundle\Entity;

/**
 * Newsletter
 */
class Newsletter
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var int
     */
    private $phone;

    /**
     * @var bool
     */
    private $agreement;


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
     * Set mail
     *
     * @param string $mail
     *
     * @return Newsletter
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return Newsletter
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set agreement
     *
     * @param boolean $agreement
     *
     * @return Newsletter
     */
    public function setAgreement($agreement)
    {
        $this->agreement = $agreement;

        return $this;
    }

    /**
     * Get agreement
     *
     * @return bool
     */
    public function getAgreement()
    {
        return $this->agreement;
    }

    public function __toString()
    {
        return $this->mail;
    }
}
