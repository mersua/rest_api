<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

/**
 * Class BaseApiController is parent Controller for all special Controller of REST API
 * @package AppBundle\Controller
 */
class BaseApiController extends FOSRestController
{
    /**
     * Method validate entity model by Symfony\Component\Validator\Constraints
     * @param object $model
     * @return array
     */
    protected function validator($model)
    {
        $validator = $this->get('validator');
        $errors = $validator->validate($model);

        $errorMessages = [];
        if(count($errors) > 0)
        {
            foreach ($errors as $error)
            {
                $errorMessages[] = $error->getMessage();
            }
        }

        return $errorMessages;
    }

    /**
     * @param mixed $data
     * @return string
     */
    protected function serialize($data)
    {
        return $this->container
            ->get('jms_serializer')
            ->serialize($data, 'json');
    }

    /**
     * @param string $inputStr
     * @param string $typeName
     * @param string $format
     * @return mixed
     */
    protected function deserialize($inputStr, $typeName, $format)
    {
        return $this->container
            ->get('jms_serializer')
            ->deserialize($inputStr, $typeName, $format);
    }
}
