<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\User;

class UserController extends BaseApiController
{
    /**
     * @Get("/store/users")
     * @return Response
     */
    public function getUsersAction()
    {
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();

        if (empty($users)) {
            $errorsJson = $this->serialize(["message" => "Users do not exist"]);
            return new Response($errorsJson, Response::HTTP_NO_CONTENT);
        }

        $jsonData = $this->serialize($users);
        return new Response($jsonData, Response::HTTP_OK);
    }

    /**
     * @Post("/store/user")
     * @param Request $request
     * @return View
     */
    public function addUserAction(Request $request)
    {
        $data = json_decode($request->getContent());

        $user = new User();
        $user->setName($data->name);

        $errors = $this->validator($user);
        if($errors)
        {
            return new View(["errorMessages" => $errors], Response::HTTP_BAD_REQUEST);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return new View($user, Response::HTTP_CREATED);
    }
}