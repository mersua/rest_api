<?php

namespace AppBundle\Entity\Catalog;

use Symfony\Component\Validator\Constraints as Assert;

class Phone extends BaseProduct
{

    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Model must be at least {{ limit }} characters long",
     *      maxMessage = "Model name cannot be longer than {{ limit }} characters"
     * )
     * @Assert\NotNull(
     *     message = "Model should not be null"
     * )
     * @Assert\NotBlank(
     *     message = "Model should not be blank"
     * )
     */
    private $model;

    /**
     * @Assert\Length(
     *      min = 3,
     *      max = 255,
     *      minMessage = "OS must be at least {{ limit }} characters long",
     *      maxMessage = "OS cannot be longer than {{ limit }} characters"
     * )
     * @Assert\NotNull(
     *     message = "OS should not be null"
     * )
     * @Assert\NotBlank(
     *     message = "OS should not be blank"
     * )
     */
    private $os;

    /**
     * @Assert\GreaterThan(
     *     value = 0,
     *     message = "Diagonal of screen should be greater than {{ compared_value }}"
     * )
     * @Assert\NotNull(
     *     message = "Diagonal should not be null"
     * )
     */
    private $diagonal;

    /**
     * @Assert\GreaterThan(
     *     value = 0,
     *     message = "Weight should be greater than {{ compared_value }}"
     * )
     * @Assert\NotNull(
     *     message = "Weight should not be null"
     * )
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
