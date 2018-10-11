<?php

namespace AppBundle\Controller\Catalog;

use AppBundle\Entity\User\User;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Context\Context;
use JMS\Serializer\DeserializationContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Catalog\Phone;

class PhoneController extends ProductController
{

    /**
     * @return View
     */
    public function getAllAction()
    {
        return $this->baseGetAllAction(Phone::class);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function addAction(Request $request)
    {
        return $this->baseAddAction($request, Phone::class);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return View
     */
    public function editAction(Request $request, $id)
    {
        /** @var User $user */
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if(!$user->isAdminRole()) {
            return View::create("Access denied!", Response::HTTP_UNAUTHORIZED);
        }

        $em = $this->getDoctrine()->getManager();
        $phone = $em->getRepository(Phone::class)->find($id);

        /** @var Phone $newPhone */
        $newPhone = $this->get('jms_serializer')->deserialize(
            $request->getContent(),
            Phone::class,
            'json',
            DeserializationContext::create()->setGroups(['update'])
        );

        $errors = $this->get('validator')->validate($newPhone, null, ['update']);
        if (count($errors) > 0) {
            return View::create($errors, Response::HTTP_BAD_REQUEST);
        }

        if($phone) {
            $phone->setName($newPhone->getName());
            $phone->setManufacturer($newPhone->getManufacturer());
            $phone->setPrice($newPhone->getPrice());
            $phone->setModel($newPhone->getModel());
            $phone->setOs($newPhone->getOs());
            $phone->setDiagonal($newPhone->getDiagonal());
            $phone->setDiagonal($newPhone->getDiagonal());
            $phone->setWeight($newPhone->getWeight());

            $view = View::create($phone, Response::HTTP_OK);
        } else {
            $em->persist($phone);

            $view = View::create($phone, Response::HTTP_CREATED);
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
        return $this->baseDeleteAction($id, Phone::class);
    }
}