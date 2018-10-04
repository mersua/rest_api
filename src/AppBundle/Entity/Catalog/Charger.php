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
class Charger extends BaseProduct
{

    /**
     * @ORM\Column(name="voltage", type="integer")
     * @Groups({"charger"})
     * @Expose
     */
    private $voltage;

    /**
     * @ORM\Column(name="material", type="string", length=255)
     * @Groups({"charger"})
     * @Expose
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

