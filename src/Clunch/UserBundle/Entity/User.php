<?php

namespace Clunch\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 */
class User extends BaseUser
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $picture;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->roles = array('ROLE_USER');
    }

    /**
     * Set picture
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $picture
     *
     * @return User
     */
    public function setPicture(\Application\Sonata\MediaBundle\Entity\Media $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getPicture()
    {
        return $this->picture;
    }
    /**
     * @var \Clunch\CompanyBundle\Entity\Company
     */
    private $company;


    /**
     * Set company
     *
     * @param \Clunch\CompanyBundle\Entity\Company $company
     *
     * @return User
     */
    public function setCompany(\Clunch\CompanyBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Clunch\CompanyBundle\Entity\Company
     */
    public function getCompany()
    {
        return $this->company;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $allergy;


    /**
     * Add allergy
     *
     * @param \Clunch\AllergyBundle\Entity\Allergy $allergy
     *
     * @return User
     */
    public function addAllergy(\Clunch\AllergyBundle\Entity\Allergy $allergy)
    {
        $this->allergy[] = $allergy;

        return $this;
    }

    /**
     * Remove allergy
     *
     * @param \Clunch\AllergyBundle\Entity\Allergy $allergy
     */
    public function removeAllergy(\Clunch\AllergyBundle\Entity\Allergy $allergy)
    {
        $this->allergy->removeElement($allergy);
    }

    /**
     * Get allergy
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAllergy()
    {
        return $this->allergy;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comments;


    /**
     * Add comment
     *
     * @param \Clunch\CommentBundle\Entity\Comment $comment
     *
     * @return User
     */
    public function addComment(\Clunch\CommentBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \Clunch\CommentBundle\Entity\Comment $comment
     */
    public function removeComment(\Clunch\CommentBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if (!$this->username) {
            return '';
        }

        return $this->username;
    }
    /**
     * @var string
     */
    private $description;


    /**
     * Set description
     *
     * @param string $description
     *
     * @return User
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
}
