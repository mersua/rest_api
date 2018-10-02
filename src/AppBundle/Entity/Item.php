<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ItemRepository")
 */
class Item
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
     * @ORM\Column(name="name", type="string", length=255, options={"comment":"Item name"})
     *
     * @Assert\Length(
     *      min = 5,
     *      max = 255,
     *      minMessage = "Item's name must be at least {{ limit }} characters long",
     *      maxMessage = "Item's name cannot be longer than {{ limit }} characters"
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
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2, options={"comment":"Item Price"})
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
     * @return Item
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
     * Set price
     *
     * @param string $price
     *
     * @return Item
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
