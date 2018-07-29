<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Item;

class ItemController extends FOSRestController
{
    /**
     * @Get("/store/items")
     * @return View
     */
    public function getItemsAction()
    {
        $items = $this->getDoctrine()->getRepository('AppBundle:Item')->findAll();

        if (empty($items)) {
            return new View(["message" => "Items not exists"], Response::HTTP_NO_CONTENT);
        }
        return new View($items, Response::HTTP_OK);
    }

    /**
     * @Post("/store/item")
     * @param Request $request
     * @return View
     */
    public function addItemAction(Request $request)
    {
        $name = $request->get('name');
        $price = str_replace([","], ".", $request->get('price'));

        $item = new Item();
        $item->setName($name);
        $item->setPrice($price);

        $validator = $this->get('validator');
        $errors = $validator->validate($item);

        if(count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }

            return new View(["errorMessages" => $errorMessages], Response::HTTP_BAD_REQUEST);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($item);
        $em->flush();

        $data = ["name" => $name, "price" => $price];
        return new View($data, Response::HTTP_CREATED);
    }
}
