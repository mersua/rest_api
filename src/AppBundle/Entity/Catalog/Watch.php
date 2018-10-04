<?php

namespace AppBundle\Entity\Catalog;

use Doctrine\ORM\Mapping as ORM;

use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\ExclusionPolicy;

/**
 * @ORM\Entity
 * @ExclusionPolicy("all")
 */
class Watch extends BaseProduct
{

    /**
     * @ORM\Column(name="gender", type="string", length=255)
     * @Groups({"watch"})
     * @Expose
     */
    private $gender;

    /**
     * @ORM\Column(name="color", type="string", length=255)
     * @Groups({"watch"})
     * @Expose
     */
    private $color;

    /**
     * @ORM\Column(name="feature", type="string", length=255)
     * @Groups({"watch"})
     * @Expose
     */
    private $feature;

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Watch
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Watch
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set feature
     *
     * @param string $feature
     *
     * @return Watch
     */
    public function setFeature($feature)
    {
        $this->feature = $feature;

        return $this;
    }

    /**
     * Get feature
     *
     * @return string
     */
    public function getFeature()
    {
        return $this->feature;
    }
}

