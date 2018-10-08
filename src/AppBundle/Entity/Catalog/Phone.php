<?php

namespace AppBundle\Entity\Catalog;

use Symfony\Component\Validator\Constraints as Assert;

class Phone extends BaseProduct
{

    /**
     * @var string
     */
    private $model;

    /**
     * @var string
     */
    private $os;

    /**
     * @var float
     */
    private $diagonal;

    /**
     * @var float
     */
    private $weight;

    /**
     * @param string $model
     * @return Phone
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $os
     * @return Phone
     */
    public function setOs($os)
    {
        $this->os = $os;

        return $this;
    }

    /**
     * @return string
     */
    public function getOs()
    {
        return $this->os;
    }

    /**
     * @param string $diagonal
     * @return Phone
     */
    public function setDiagonal($diagonal)
    {
        $this->diagonal = $diagonal;

        return $this;
    }

    /**
     * @return string
     */
    public function getDiagonal()
    {
        return $this->diagonal;
    }

    /**
     * @param string $weight
     * @return Phone
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }
}
