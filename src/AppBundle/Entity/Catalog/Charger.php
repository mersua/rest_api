<?php

namespace AppBundle\Entity\Catalog;

use Symfony\Component\Validator\Constraints as Assert;

class Charger extends BaseProduct
{

    /**
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
     * @param integer $voltage
     * @return Charger
     */
    public function setVoltage($voltage)
    {
        $this->voltage = $voltage;

        return $this;
    }

    /**
     * @return int
     */
    public function getVoltage()
    {
        return $this->voltage;
    }

    /**
     * @param string $material
     * @return Charger
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * @return string
     */
    public function getMaterial()
    {
        return $this->material;
    }
}

