<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Item;

class ItemController extends BaseApiController
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
        $data = json_decode($request->getContent());

        $item = new Item();
        $item->setName($data->name);
        $item->setPrice(str_replace([","], ".", $data->price));

        $errors = $this->validator($item);

        if($errors) {
            return new View(["errorMessages" => $errors], Response::HTTP_BAD_REQUEST);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($item);
        $em->flush();

        return new View($item, Response::HTTP_CREATED);
    }
}
