<?php

namespace AppBundle\Controller\Catalog;

use AppBundle\Entity\User\User;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Context\Context;
use JMS\Serializer\DeserializationContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Catalog\Watch;

class WatchController extends ProductController
{

    /**
     * @return View
     */
    public function getAllAction()
    {
        return $this->baseGetAllAction(Watch::class);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function addAction(Request $request)
    {
        return $this->baseAddAction($request, Watch::class);
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
        $watch = $em->getRepository(Watch::class)->find($id);

        /** @var Watch $newWatch */
        $newWatch = $this->get('jms_serializer')->deserialize(
            $request->getContent(),
            Watch::class,
            'json',
            DeserializationContext::create()->setGroups(['update'])
        );

        $errors = $this->get('validator')->validate($newWatch, null, ['update']);
        if (count($errors) > 0) {
            return View::create($errors, Response::HTTP_BAD_REQUEST);
        }

        if($watch) {
            $watch->setName($newWatch->getName());
            $watch->setManufacturer($newWatch->getManufacturer());
            $watch->setPrice($newWatch->getPrice());
            $watch->setGender($newWatch->getGender());
            $watch->setColor($newWatch->getColor());
            $watch->setFeature($newWatch->getFeature());

            $view = View::create($watch, Response::HTTP_OK);
        } else {
            $em->persist($watch);

            $view = View::create($watch, Response::HTTP_CREATED);
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
        return $this->baseDeleteAction($id, Watch::class);
    }
}