<?php

namespace AppBundle\Entity\Catalog;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Charger extends BaseProduct
{

    /**
     * @var int
     *
     * @ORM\Column(name="voltage", type="integer")
     */
    private $voltage;

    /**
     * @var string
     *
     * @ORM\Column(name="material", type="string", length=255)
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

