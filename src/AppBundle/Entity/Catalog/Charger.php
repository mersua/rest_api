<?php

namespace AppBundle\Entity\Catalog;

use Symfony\Component\Validator\Constraints as Assert;

class Charger extends BaseProduct
{

    /**
     * @var int
     */
    private $voltage;

    /**
     * @var string
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

