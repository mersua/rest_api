<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Orders
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrdersRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Orders
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
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     *
     * @Assert\NotBlank(
     *     message = "Create date should not be blank"
     * )
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime")
     *
     * @Assert\NotBlank(
     *     message = "Update date should not be blank"
     * )
     */
    private $updated;

    /**
     * @var int
     *
     * @ORM\Column(name="totalQuantity", type="integer")
     *
     * @Assert\GreaterThan(
     *     value = 0,
     *     message = "Total Quantity should be greater than {{ compared_value }}"
     * )
     * @Assert\NotNull(
     *     message = "Total Quantity should not be null"
     * )
     */
    private $totalQuantity;

    /**
     * @var string
     *
     * @ORM\Column(name="totalPrice", type="decimal", precision=10, scale=2)
     *
     * @Assert\GreaterThan(
     *     value = 0,
     *     message = "Total Price should be greater than {{ compared_value }}"
     * )
     * @Assert\NotNull(
     *     message = "Total Price should not be null"
     * )
     */
    private $totalPrice;

    /**
     * One Order has One User.
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *
     * @Assert\NotNull(
     *     message = "User should not be null"
     * )
     * @Assert\NotBlank(
     *     message = "User should not be blank"
     * )
     */
    private $user;

    /**
     * Many Orders have Many Items.
     * @ORM\ManyToMany(targetEntity="Item")
     * @ORM\JoinTable(name="orders_items",
     *      joinColumns={@ORM\JoinColumn(name="order_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="item_id", referencedColumnName="id", unique=true)}
     * )
     *
     * @Assert\Collection(
     *     fields={
     *         "name"  = @Assert\Required(@Assert\NotBlank),
     *         "price" = @Assert\Required(@Assert\NotBlank)
     *     }
     * )
     * @Assert\Count(
     *      min = 1,
     *      max = 1000,
     *      minMessage = "You must specify at least one item",
     *      maxMessage = "You cannot specify more than {{ limit }} items"
     * )
     */
    private $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();

        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedValue()
    {
        $this->setUpdated(new \DateTime());
    }

    public function addItem(Item $item)
    {
        $this->items[] = $item;
    }

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
     * @return Orders
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Orders
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Orders
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set totalQuantity
     *
     * @param integer $totalQuantity
     *
     * @return Orders
     */
    public function setTotalQuantity($totalQuantity)
    {
        $this->totalQuantity = $totalQuantity;

        return $this;
    }

    /**
     * Get totalQuantity
     *
     * @return int
     */
    public function getTotalQuantity()
    {
        return $this->totalQuantity;
    }

    /**
     * Set totalPrice
     *
     * @param string $totalPrice
     *
     * @return Orders
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get totalPrice
     *
     * @return string
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set user
     *
     * @param integer $user
     *
     * @return Orders
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set items
     *
     * @param integer $items
     *
     * @return Orders
     */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Get items
     *
     * @return ArrayCollection
     */
    public function getItems()
    {
        return $this->items;
    }
}

