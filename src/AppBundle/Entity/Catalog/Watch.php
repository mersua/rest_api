<?php

namespace AppBundle\Entity\Catalog;

use Symfony\Component\Validator\Constraints as Assert;

class Watch extends BaseProduct
{

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $color;

    /**
     * @var string
     */
    private $feature;

    /**
     * @param string $gender
     * @return Watch
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $color
     * @return Watch
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $feature
     * @return Watch
     */
    public function setFeature($feature)
    {
        $this->feature = $feature;

        return $this;
    }

    /**
     * @return string
     */
    public function getFeature()
    {
        return $this->feature;
    }
}

