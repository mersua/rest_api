<?php

namespace AppBundle\Controller\Catalog;

use AppBundle\Controller\BaseApiController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\View;
use AppBundle\Entity\Catalog\BaseProduct;
use AppBundle\Entity\Catalog\Phone;
use AppBundle\Entity\Catalog\Charger;
use AppBundle\Entity\Catalog\Watch;
use AppBundle\Repository\Catalog\BaseProductRepository;

class ProductController extends BaseApiController
{
    private $productEntity = [
        "phone" => Phone::class,
        "charger" => Charger::class,
        "watch" => Watch::class,
    ];

    private $baseProductRepository;

    public function __construct(BaseProductRepository $baseProductRepository) {
        $this->baseProductRepository = $baseProductRepository;
    }

    /**
     * Get all products
     * @Get("/store/catalog")
     * @return Response
     */
    public function getProductsAllAction()
    {
        $products = $this->baseProductRepository->findProductsAll();

        if (empty($products)) {
            $errorsJson = $this->serialize(["message" => "Products do not exist"]);
            return new Response($errorsJson, Response::HTTP_NO_CONTENT);
        }

        $jsonData = $this->serialize($products);
        return new Response($jsonData, Response::HTTP_OK);
    }

    /**
     * Get all product of type (phone or charger or watch only)
     * @Get("/store/catalog/{type}")
     * @param string $type (can be only "phone" || "charger" || "watch")
     * @return Response
     */
    public function getProductsAction($type)
    {
        $products = $this->getDoctrine()->getRepository($this->productEntity[$type])->findAll();

        if (empty($products)) {
            $errorsJson = $this->serialize(["message" => "Products do not exist"]);
            return new Response($errorsJson, Response::HTTP_NO_CONTENT);
        }

        $jsonData = $this->serialize($products);
        return new Response($jsonData, Response::HTTP_OK);
    }

    /**
     * @Get("/store/catalog/product/{id}", requirements={"id"="\d+"})
     * @param int $id
     * @return Response
     */
    public function getProductsByIdAction($id)
    {
        $product = $this->baseProductRepository->findOneProductById($id);

        if (empty($product)) {
            $errorsJson = $this->serialize(["message" => "Product do not exist"]);
            return new Response($errorsJson, Response::HTTP_NO_CONTENT);
        }

        $jsonData = $this->serialize($product);
        return new Response($jsonData, Response::HTTP_OK);
    }

    /**
     * @Post("/store/catalog/{type}/add")
     * @param Request $request
     * @param string $type (can be only "phone" || "charger" || "watch")
     * @return Response
     */
    public function addProductAction(Request $request, $type)
    {
        $product = $this->deserialize($request->getContent(), $this->productEntity[$type], "json");

        $errors = $this->validator($product);
        if($errors)
        {
            $errorsJson = $this->serialize(["errorMessages" => $errors]);
            return new Response($errorsJson, Response::HTTP_BAD_REQUEST);
        }

        $this->baseProductRepository->addProduct($product);
        $jsonData = $this->serialize($product);
        return new Response($jsonData, Response::HTTP_CREATED);
    }

    /**
     * @Post("/store/catalog/product/{id}/remove", requirements={"id"="\d+"})
     * @param int $id
     * @return Response
     */
    public function removeProductAction($id)
    {
        $product = $this->baseProductRepository->findOneProductById($id);

        if (empty($product)) {
            $errorsJson = $this->serialize(["message" => "Product do not exist"]);
            return new Response($errorsJson, Response::HTTP_NO_CONTENT);
        }

        $this->baseProductRepository->removeProduct($product);
        $jsonData = $this->serialize(["message" => "The Product has been removed successfully!"]);
        return new Response($jsonData, Response::HTTP_OK);
    }
}