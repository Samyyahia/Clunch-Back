<?php
/**
 * Created by PhpStorm.
 * User: Samy Yahia
 * Date: 2019-04-04
 * Time: 16:37
 */

namespace Clunch\UserBundle\Controller;

use Clunch\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class UserApiController
 * @package Clunch\UserBundle\Controller
 */
class UserApiController extends Controller
{
    /**
     * Function to get Category List From Category Entity
     * Route: /api/categories
     * Method: GET
     *
     * @return JsonResponse
     */
    public function getUsersAction() {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $userRepository = $em->getRepository(User::class);
        $users = $userRepository->findAll();

        $users = $serializer->toArray($users);

        return new JsonResponse($users);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getUserAction($id) {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $userRepository = $em->getRepository(User::class);
        $user = $userRepository->find($id);

        $user = $serializer->toArray($user);

        return new JsonResponse($user);
    }
}
