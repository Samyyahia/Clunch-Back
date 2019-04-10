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
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UserApiController
 * @package Clunch\UserBundle\Controller
 */
class UserApiController extends Controller
{
    /**
     * Function to get User List From User Entity
     * Route: /api/users
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
     * Function to get single User Item From Category Entity
     * Route: /api/users/{id}
     * Method: GET
     *
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

    /**
     * Function to get single User Item From Category Entity
     * Route: /api/users/checks
     * Method: POST
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function postUserCheckAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $email = $request->get('email');

        $userRepository = $em->getRepository(User::class);
        $user = $userRepository->findOneByEmail($email);

        $res['code'] = ($user)? 200 : 400;
        $res['message'] = ($res['code'] === 200)? 'Il y a bien un utilisateur a cette adresse mail': 'Il n\'y a aucun utilisateur a cette adresse mail';

        return new JsonResponse($res);
    }
}
