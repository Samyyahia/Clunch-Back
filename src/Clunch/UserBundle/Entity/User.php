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
     * @var string
     */
    private $desc;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $picture;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set desc
     *
     * @param string $desc
     *
     * @return User
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get desc
     *
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
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
}
