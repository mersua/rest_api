<?php

namespace AppBundle\Entity\Catalog;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"base_product" = "BaseProduct", "phone" = "Phone", "charger" = "Charger", "watch" = "Watch"})
 */
abstract class BaseProduct
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
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
     * @ORM\Column(name="manufacturer", type="string", length=255)
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
     * @var double
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return BaseProduct
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set manufacturer
     *
     * @param string $manufacturer
     *
     * @return BaseProduct
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get manufacturer
     *
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return BaseProduct
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }
}
