<?php

namespace Clunch\RecipeBundle\Entity;

/**
 * Recipe
 */
class Recipe
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $body;

    /**
     * @var \DateTime
     */
    private $duration;


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
     * Set title
     *
     * @param string $title
     *
     * @return Recipe
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Recipe
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return Recipe
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set duration
     *
     * @param \DateTime $duration
     *
     * @return Recipe
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return \DateTime
     */
    public function getDuration()
    {
        return $this->duration;
    }
    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $image;


    /**
     * Set image
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $image
     *
     * @return Recipe
     */
    public function setImage(\Application\Sonata\MediaBundle\Entity\Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getImage()
    {
        return $this->image;
    }
    /**
     * @var \Clunch\CategoryBundle\Entity\Category
     */
    private $category;


    /**
     * Set category
     *
     * @param \Clunch\CategoryBundle\Entity\Category $category
     *
     * @return Recipe
     */
    public function setCategory(\Clunch\CategoryBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Clunch\CategoryBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $phonenumbers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->phonenumbers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add phonenumber
     *
     * @param \Clunch\IngredientBundle\Entity\Ingredient $phonenumber
     *
     * @return Recipe
     */
    public function addPhonenumber(\Clunch\IngredientBundle\Entity\Ingredient $phonenumber)
    {
        $this->phonenumbers[] = $phonenumber;

        return $this;
    }

    /**
     * Remove phonenumber
     *
     * @param \Clunch\IngredientBundle\Entity\Ingredient $phonenumber
     */
    public function removePhonenumber(\Clunch\IngredientBundle\Entity\Ingredient $phonenumber)
    {
        $this->phonenumbers->removeElement($phonenumber);
    }

    /**
     * Get phonenumbers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhonenumbers()
    {
        return $this->phonenumbers;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ingredient;


    /**
     * Add ingredient
     *
     * @param \Clunch\IngredientBundle\Entity\Ingredient $ingredient
     *
     * @return Recipe
     */
    public function addIngredient(\Clunch\IngredientBundle\Entity\Ingredient $ingredient)
    {
        $this->ingredient[] = $ingredient;

        return $this;
    }

    /**
     * Remove ingredient
     *
     * @param \Clunch\IngredientBundle\Entity\Ingredient $ingredient
     */
    public function removeIngredient(\Clunch\IngredientBundle\Entity\Ingredient $ingredient)
    {
        $this->ingredient->removeElement($ingredient);
    }

    /**
     * Get ingredient
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ingredients;


    /**
     * Get ingredients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIngredients()
    {
        return $this->ingredients;
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
     * @return Recipe
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
    private $tag;


    /**
     * Add tag
     *
     * @param \Clunch\TagBundle\Entity\Tag $tag
     *
     * @return Recipe
     */
    public function addTag(\Clunch\TagBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Clunch\TagBundle\Entity\Tag $tag
     */
    public function removeTag(\Clunch\TagBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTag()
    {
        return $this->tag;
    }

    public function __toString()
    {
        return $this->title;
    }
}
