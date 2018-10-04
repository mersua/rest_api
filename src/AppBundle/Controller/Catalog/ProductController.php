<?php

namespace AppBundle\Controller\Catalog;

use AppBundle\Controller\BaseApiController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View as ViewRest;
use FOS\RestBundle\Controller\Annotations\View;
use AppBundle\Entity\Catalog\Phone;

class ProductController extends BaseApiController
{
    private $productSlugEntity = [
        "phone" => "AppBundle:Catalog\Phone",
        "charger" => "AppBundle:Catalog\Charger",
        "watch" => "AppBundle:Catalog\Watch",
    ];

    /**
     * @Get("/store/catalog/{type}")
     * @param string $type
     * @return ViewRest
     */
    public function getProductsAction($type)
    {
        $phones = $this->getDoctrine()->getRepository($this->productSlugEntity[$type])->findAll();

        if (empty($phones)) {
            $errorsJson = $this->serialize(["message" => "Phones do not exist"]);
            return new ViewRest($errorsJson, Response::HTTP_NO_CONTENT);
        }

        $jsonData = $this->serialize($phones);
        return new ViewRest($jsonData, Response::HTTP_OK);
    }
}