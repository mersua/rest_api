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
class Phone extends BaseProduct
{

    /**
     * @ORM\Column(name="model", type="string", length=255)
     * @Groups({"phone"})
     * @Expose
     */
    private $model;

    /**
     * @ORM\Column(name="os", type="string", length=255)
     * @Groups({"phone"})
     * @Expose
     */
    private $os;

    /**
     * @ORM\Column(name="diagonal", type="decimal", precision=3, scale=2)
     * @Groups({"phone"})
     * @Expose
     */
    private $diagonal;

    /**
     * @ORM\Column(name="weight", type="decimal", precision=5, scale=2)
     * @Groups({"phone"})
     * @Expose
     */
    private $weight;

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Phone
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set os
     *
     * @param string $os
     *
     * @return Phone
     */
    public function setOs($os)
    {
        $this->os = $os;

        return $this;
    }

    /**
     * Get os
     *
     * @return string
     */
    public function getOs()
    {
        return $this->os;
    }

    /**
     * Set diagonal
     *
     * @param string $diagonal
     *
     * @return Phone
     */
    public function setDiagonal($diagonal)
    {
        $this->diagonal = $diagonal;

        return $this;
    }

    /**
     * Get diagonal
     *
     * @return string
     */
    public function getDiagonal()
    {
        return $this->diagonal;
    }

    /**
     * Set weight
     *
     * @param string $weight
     *
     * @return Phone
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }
}

