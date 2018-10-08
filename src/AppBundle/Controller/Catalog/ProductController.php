<?php

namespace AppBundle\Controller\Catalog;

use AppBundle\Controller\BaseApiController;
use AppBundle\Entity\Catalog\BaseProduct;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Context\Context;
use JMS\Serializer\DeserializationContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends BaseApiController
{

    /**
     * @param string $entityClass
     * @return View
     */
    public function baseGetAllAction($entityClass = BaseProduct::class)
    {
        $products = $this->getDoctrine()->getRepository($entityClass)->findAll();

        if (empty($products)) {
            return new View(["message" => "Products do not exist"], Response::HTTP_NO_CONTENT);
        }

        $view = View::create($products, Response::HTTP_OK);
        $context = (new Context())->setGroups(['default'])->enableMaxDepth();
        $view->setContext($context);

        return $view;
    }

    /**
     * @param int $id
     * @param string $entityClass
     * @return View
     */
    public function baseGetProductByIdAction($id, $entityClass = BaseProduct::class)
    {
        $product = $this->getDoctrine()->getRepository($entityClass)->find($id);

        if(!$product) {
            return View::create('The product does not exist!', Response::HTTP_NOT_FOUND);
        }

        $view = View::create($product, Response::HTTP_OK);
        $context = (new Context())->setGroups(['default'])->enableMaxDepth();
        $view->setContext($context);

        return $view;
    }

    /**
     * @param Request $request
     * @param string $entityClass
     * @return View
     */
    public function baseAddAction(Request $request, $entityClass = BaseProduct::class)
    {

        /** @var BaseProduct $product */
        $product = $this->get('jms_serializer')->deserialize(
            $request->getContent(),
            $entityClass,
            'json',
            DeserializationContext::create()->setGroups(['create'])
        );

        $errors = $this->get('validator')->validate($product, null, ['create']);
        if (count($errors) > 0) {
            return View::create($errors, Response::HTTP_BAD_REQUEST);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

        $view = View::create($product, Response::HTTP_CREATED);
        $context = (new Context())->setGroups(['default'])->enableMaxDepth();
        $view->setContext($context);

        return $view;
    }

    /**
     * @param int $id
     * @param string $entityClass
     * @return View
     */
    public function baseDeleteAction($id, $entityClass = BaseProduct::class)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository($entityClass)->find($id);

        if(!$product) {
            return View::create('The product does not exist!', Response::HTTP_NOT_FOUND);
        }

        $em->remove($product);
        $em->flush();

        return View::create('The product was deleted successfully!', Response::HTTP_OK);
    }
}