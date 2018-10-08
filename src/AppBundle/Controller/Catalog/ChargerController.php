<?php

namespace AppBundle\Controller\Catalog;

use FOS\RestBundle\View\View;
use FOS\RestBundle\Context\Context;
use JMS\Serializer\DeserializationContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Catalog\Charger;

class ChargerController extends ProductController
{

    /**
     * @return View
     */
    public function getAllAction()
    {
        return $this->baseGetAllAction(Charger::class);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function addAction(Request $request)
    {
        return $this->baseAddAction($request, Charger::class);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return View
     */
    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $charger = $em->getRepository(Charger::class)->find($id);

        /** @var Charger $newCharger */
        $newCharger = $this->get('jms_serializer')->deserialize(
            $request->getContent(),
            Charger::class,
            'json',
            DeserializationContext::create()->setGroups(['update'])
        );

        $errors = $this->get('validator')->validate($newCharger, null, ['update']);
        if (count($errors) > 0) {
            return View::create($errors, Response::HTTP_BAD_REQUEST);
        }

        if($charger) {
            $charger->setName($newCharger->getName());
            $charger->setManufacturer($newCharger->getManufacturer());
            $charger->setPrice($newCharger->getPrice());
            $charger->setVoltage($newCharger->getVoltage());
            $charger->setMaterial($newCharger->getMaterial());

            $view = View::create($charger, Response::HTTP_OK);
        } else {
            $em->persist($charger);

            $view = View::create($charger, Response::HTTP_CREATED);
        }

        $em->flush();

        $context = (new Context())->setGroups(['default'])->enableMaxDepth();
        $view->setContext($context);
        return $view;
    }

    /**
     * @param int $id
     * @return View
     */
    public function deleteAction($id)
    {
        return $this->baseDeleteAction($id, Charger::class);
    }
}