<?php

namespace AppBundle\Entity\Catalog;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\ExclusionPolicy;

/**
 * @ORM\Entity
 * @ExclusionPolicy("all")
 */
class Charger extends BaseProduct
{

    /**
     * @ORM\Column(name="voltage", type="integer")
     * @Groups({"charger"})
     * @Expose
     * @Assert\GreaterThan(
     *     value = 0,
     *     message = "Voltage of screen should be greater than {{ compared_value }}"
     * )
     * @Assert\NotNull(
     *     message = "Voltage should not be null"
     * )
     */
    private $voltage;

    /**
     * @ORM\Column(name="material", type="string", length=255)
     * @Groups({"charger"})
     * @Expose
     *
     * @Assert\Length(
     *      min = 3,
     *      max = 255,
     *      minMessage = "Material must be at least {{ limit }} characters long",
     *      maxMessage = "Material cannot be longer than {{ limit }} characters"
     * )
     * @Assert\NotNull(
     *     message = "Material should not be null"
     * )
     * @Assert\NotBlank(
     *     message = "Material should not be blank"
     * )
     */
    private $material;

    /**
     * Set voltage
     *
     * @param integer $voltage
     *
     * @return Charger
     */
    public function setVoltage($voltage)
    {
        $this->voltage = $voltage;

        return $this;
    }

    /**
     * Get voltage
     *
     * @return int
     */
    public function getVoltage()
    {
        return $this->voltage;
    }

    /**
     * Set material
     *
     * @param string $material
     *
     * @return Charger
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get material
     *
     * @return string
     */
    public function getMaterial()
    {
        return $this->material;
    }
}

