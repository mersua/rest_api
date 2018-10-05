<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class User
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
     * @Assert\Length(
     *     min = 5,
     *     max = 255,
     *     minMessage = "User's name must be at least {{ limit }} characters long",
     *     maxMessage = "User's name cannot be longer than {{ limit }} characters"
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
     * @Assert\NotBlank(
     *     message = "Create date should not be blank"
     * )
     */
    private $created;

    public function __construct()
    {
        $this->setCreated(new \DateTime());
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     *
     * @return User
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
     * @param \DateTime $created
     *
     * @return User
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }
}
