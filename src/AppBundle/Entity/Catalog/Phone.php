<?php

namespace AppBundle\Entity\Catalog;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Phone extends BaseProduct
{

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="os", type="string", length=255)
     */
    private $os;

    /**
     * @var string
     *
     * @ORM\Column(name="diagonal", type="decimal", precision=3, scale=2)
     */
    private $diagonal;

    /**
     * @var string
     *
     * @ORM\Column(name="weight", type="decimal", precision=5, scale=2)
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

