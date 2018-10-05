<?php

namespace AppBundle\Controller\Catalog;

use FOS\RestBundle\View\View;
use FOS\RestBundle\Context\Context;
use AppBundle\Controller\BaseApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Catalog\Phone;
use AppBundle\Repository\Catalog\PhoneRepository;

class PhoneController extends BaseApiController
{

    /**
     * @return View
     */
    public function getAllAction()
    {
        $phones = $this->getDoctrine()->getRepository(Phone::class)->findAll();

        if (empty($phones)) {
            return new View(["message" => "Phones do not exist"], Response::HTTP_NO_CONTENT);
        }

        $view = View::create($phones);
        $context = (new Context())->setGroups(['default'])->enableMaxDepth();
        $view->setContext($context);

//        $jsonData = $this->serialize($phones);
//        return new Response($jsonData, Response::HTTP_OK);
    }
}