<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\User;

class UserController extends FOSRestController
{
    /**
     * @Get("/store/users")
     * @return View
     */
    public function getUsersAction()
    {
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();

        if (empty($users)) {
            return new View(["message" => "Users not exists"], Response::HTTP_NO_CONTENT);
        } else
        return new View($users, Response::HTTP_OK);
    }

    /**
     * @Post("/store/user")
     * @param Request $request
     * @return View
     */
    public function addUserAction(Request $request)
    {
        $name = $request->get('name');

        $user = new User();
        $user->setName($name);

        $validator = $this->get('validator');
        $errors = $validator->validate($user);

        if(count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }

            return new View(["errorMessages" => $errorMessages], Response::HTTP_BAD_REQUEST);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        $data = ["name" => $name];
        return new View($data, Response::HTTP_CREATED);
    }
}
