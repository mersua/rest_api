<?php

namespace AppBundle\Entity\Catalog;

use Symfony\Component\Validator\Constraints as Assert;

class Watch extends BaseProduct
{

    /**
     * @Assert\Length(
     *      min = 3,
     *      max = 255,
     *      minMessage = "Gender must be at least {{ limit }} characters long",
     *      maxMessage = "Gender cannot be longer than {{ limit }} characters"
     * )
     * @Assert\NotNull(
     *     message = "Gender should not be null"
     * )
     * @Assert\NotBlank(
     *     message = "Gender should not be blank"
     * )
     */
    private $gender;

    /**
     * @Assert\Length(
     *      min = 3,
     *      max = 255,
     *      minMessage = "Color must be at least {{ limit }} characters long",
     *      maxMessage = "Color cannot be longer than {{ limit }} characters"
     * )
     * @Assert\NotNull(
     *     message = "Color should not be null"
     * )
     * @Assert\NotBlank(
     *     message = "Color should not be blank"
     * )
     */
    private $color;

    /**
     * @Assert\Length(
     *      min = 3,
     *      max = 255,
     *      minMessage = "Feature must be at least {{ limit }} characters long",
     *      maxMessage = "Feature cannot be longer than {{ limit }} characters"
     * )
     * @Assert\NotNull(
     *     message = "Feature should not be null"
     * )
     * @Assert\NotBlank(
     *     message = "Feature should not be blank"
     * )
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

