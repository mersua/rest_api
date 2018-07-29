<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\User;
use AppBundle\Entity\Item;
use AppBundle\Entity\Orders;

class OrderController extends BaseApiController
{
    /**
     * @Get("/store/orders")
     * @return View
     */
    public function getOrdersAction()
    {
        $orders = $this->getDoctrine()->getRepository('AppBundle:Orders')->findAll();

        if (empty($orders)) {
            return new View(["message" => "Orders not exists"], Response::HTTP_NO_CONTENT);
        }

        return new View($orders, Response::HTTP_OK);
    }

    /**
     * @Post("/store/order")
     * @param Request $request
     * @return View
     */
    public function addOrderAction(Request $request)
    {
        $data = json_decode($request->getContent());

        if(empty($data->name) || !is_integer($data->user->id) || count($data->items) < 1) {
            return new View(["errorMessages" => "Invalid request data"], Response::HTTP_BAD_REQUEST);
        }

        $userRepository = $this->getDoctrine()->getRepository(User::class);
        $itemRepository = $this->getDoctrine()->getRepository(Item::class);
        $user = $userRepository->findOneById($data->user->id);

        $order = new Orders();
        $order->setName($data->name);
        $order->setUser($user);

        $totalQuantity = 0;
        $totalPrice = 0.00;
        foreach ($data->items as $itemData) {
            $item = $itemRepository->findOneById($itemData->id);
            $order->addItem($item);
            $totalQuantity += $itemData->qty;
            $totalPrice += $itemData->qty * $item->getPrice();
        }

        $order->setTotalQuantity($totalQuantity);
        $order->setTotalPrice($totalPrice);

        $errors = $this->validator($order);

        if($errors) {
            return new View(["errorMessages" => $errors], Response::HTTP_BAD_REQUEST);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($order);
        $em->flush();

        return new View($order, Response::HTTP_CREATED);
    }
}
