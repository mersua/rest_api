<?php

namespace AppBundle\Entity\Catalog;

use Symfony\Component\Validator\Constraints as Assert;

abstract class BaseProduct
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Product's name must be at least {{ limit }} characters long",
     *      maxMessage = "Product's name cannot be longer than {{ limit }} characters"
     * )
     * @Assert\NotNull(
     *     message = "Name should not be null"
     * )
     * @Assert\NotBlank(
     *     message = "Name should not be blank"
     * )
     */
    private $name;

    /**
     * @var string
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Manufacturer must be at least {{ limit }} characters long",
     *      maxMessage = "Manufacturer cannot be longer than {{ limit }} characters"
     * )
     * @Assert\NotNull(
     *     message = "Manufacturer should not be null"
     * )
     * @Assert\NotBlank(
     *     message = "Manufacturer should not be blank"
     * )
     */
    private $manufacturer;

    /**
     * @var float
     *
     * @Assert\GreaterThan(
     *     value = 0,
     *     message = "Price should be greater than {{ compared_value }}"
     * )
     * @Assert\NotNull(
     *     message = "Price should not be null"
     * )
     */
    private $price;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     * @return BaseProduct
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $manufacturer
     * @return BaseProduct
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param float $price
     * @return BaseProduct
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
}
